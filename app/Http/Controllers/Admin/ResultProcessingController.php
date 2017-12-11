<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateResultProcessingRequest;
use App\Http\Requests\Admin\UpdateResultProcessingRequest;
use App\Jobs\SendNotification;
use App\Mail\SendNotification as SendEmailNotification;
use App\Models\Admin\ResultDetail;
use App\Models\Admin\ResultProcessing;
use App\Models\Admin\SchoolSession;
use App\Models\Admin\Student;
use App\Repositories\Admin\CourseRepository;
use App\Repositories\Admin\LevelRepository;
use App\Repositories\Admin\ResultProcessingRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\SchoolSessionRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ResultProcessingController extends AppBaseController
{
    /** @var  ResultProcessingRepository */
    private $resultProcessingRepository;

    public function __construct(ResultProcessingRepository $resultProcessingRepo)
    {
        $this->resultProcessingRepository = $resultProcessingRepo;
    }

    /**
     * Display a listing of the ResultProcessing.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->resultProcessingRepository->pushCriteria(new RequestCriteria($request));
        $resultProcessings = $this->resultProcessingRepository->all();

        return view('admin.result_processings.index')
            ->with('resultProcessings', $resultProcessings);
    }

    /**
     * Show the form for creating a new ResultProcessing.
     *
     * @param SchoolSessionRepository $schoolSession
     * @param LevelRepository $levelRepository
     *
     * @return Response
     */
    public function create(
        SchoolSessionRepository $schoolSession,
        LevelRepository $levelRepository,
        CourseRepository $courseRepository
    )
    {
        $semester=[
          ""=>"Select Semester",
          "1"=>"First Semester",
          "2"=>"Second Semester"
        ];

        $sessionArray=[""=>"Select Session"];
        $allSessions=$schoolSession->all();
        foreach ($allSessions as $session){
            $sessionArray[$session->id]=$session->session_name;
        }

        $levelArray=[
            ""=>"Select Level"
        ];

        $allLevels=$levelRepository->all();
        foreach ($allLevels as $level){
            $levelArray[$level->id]=$level->level;
        }

        $courseArray=[""=>"Select Course"];
        $courses=$courseRepository->all();
        foreach ($courses as $course){
            $courseArray[$course->id]=$course->course_name;
        }

        return view('admin.result_processings.create',[
            "semesters"=>$semester,
            "schoolSessions"=>$sessionArray,
            "levels"=>$levelArray,
            "courses"=>$courseArray
        ]);
    }

    /**
     * Store a newly created ResultProcessing in storage.
     *
     * @param CreateResultProcessingRequest $request
     *
     * @return Response
     */
    public function store(CreateResultProcessingRequest $request)
    {
        $input = $request->all();

        $resultProcessing = $this->resultProcessingRepository->create($input);

        Flash::success('Result Processing saved successfully.');

        return redirect(route('admin.resultProcessings.index'));
    }

    /**
     * Display the specified ResultProcessing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            Flash::error('Result Processing not found');

            return redirect(route('admin.resultProcessings.index'));
        }

        return view('admin.result_processings.show')->with('resultProcessing', $resultProcessing);
    }

    /**
     * Show the form for editing the specified ResultProcessing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            Flash::error('Result Processing not found');

            return redirect(route('admin.resultProcessings.index'));
        }

        return view('admin.result_processings.edit')->with('resultProcessing', $resultProcessing);
    }

    /**
     * Update the specified ResultProcessing in storage.
     *
     * @param  int              $id
     * @param UpdateResultProcessingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultProcessingRequest $request)
    {
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            Flash::error('Result Processing not found');

            return redirect(route('admin.resultProcessings.index'));
        }

        $resultProcessing = $this->resultProcessingRepository->update($request->all(), $id);

        Flash::success('Result Processing updated successfully.');

        return redirect(route('admin.resultProcessings.index'));
    }

    /**
     * Remove the specified ResultProcessing from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            Flash::error('Result Processing not found');

            return redirect(route('admin.resultProcessings.index'));
        }

        $this->resultProcessingRepository->delete($id);

        Flash::success('Result Processing deleted successfully.');

        return redirect(route('admin.resultProcessings.index'));
    }


    public function showUpload(
        SchoolSessionRepository $schoolSession,
        LevelRepository $levelRepository,
        CourseRepository $courseRepository
    ){

        $semester=[
            ""=>"Select Semester",
            "1"=>"First Semester",
            "2"=>"Second Semester"
        ];

        $sessionArray=[""=>"Select Session"];
        $allSessions=$schoolSession->all();
        foreach ($allSessions as $session){
            $sessionArray[$session->id]=$session->session_name;
        }

        $levelArray=[
            ""=>"Select Level"
        ];

        $allLevels=$levelRepository->all();
        foreach ($allLevels as $level){
            $levelArray[$level->id]=$level->level;
        }

        $courseArray=[""=>"Select Course"];
        $courses=$courseRepository->all();
        foreach ($courses as $course){
            $courseArray[$course->id]=$course->course_name;
        }

        return view('admin.result_processings.upload',[
            "semester"=>$semester,
            "sessions"=>$sessionArray,
            "levels"=>$levelArray,
            "courses"=>$courseArray
        ]);
    }


    public function upload(ResultProcessingRepository $resultProcessing){
        $data=Input::all();

        $scores=Input::file("scores");

        if($scores==null){
            Flash::error('Student not found');
            return redirect(route('admin.students.index'));
        }

        $destination=time().'_'.$scores->getClientOriginalExtension();
        $scores->move(public_path('students'),$destination);

        Log::info("File Uploaded Successfully");
        return $this->loadToDataBase(public_path("students")."/".$destination,$resultProcessing);
    }

    public function loadToDataBase($file, ResultProcessingRepository $resultProcessing){
        DB::beginTransaction();
        try{
            Excel::load($file, function($reader) use($resultProcessing){

                $session_id=Input::get("session_id");
                $semester_id=Input::get("semester_id");
                $course_id=Input::get("course_id");
                $level_id=Input::get("level_id");

                //lets save the initial record to get the result processing id
                $newRecord=$resultProcessing->findWhere(["session_id"=>$session_id,
                    "semester_id"=>$semester_id]);

                if(count($newRecord)<=0){
                    $newRecord=$resultProcessing->create([
                        "session_id"=>$session_id,
                        "semester_id"=>$semester_id,
                        "level_id"=>$level_id
                    ]);

                    if(!$newRecord){
                        Flash::error("An error occurred");
                        return redirect()->back();
                    }
                }else{
                    $newRecord=$newRecord->first();
                }

                $results=$reader->get();

                foreach ($results as $result){

                    $studentInfo=Student::where("matric_no","=",$result->matric)->get();

                    if($studentInfo!=null){

                        $student_id=$studentInfo->first()->id;
                        $newResultDetail=ResultDetail::create([
                            "result_process_id"=>$newRecord->id,
                            "course_id"=>$course_id,
                            "student_id"=>$student_id,
                            "score"=>$result->score
                        ]);

                        if(!$newResultDetail){
                            Log::info("Cannot create a new result record");
                        }
                    }

                }
            });


            DB::commit();
            Flash::success("All records uploaded successfully!!");
            return redirect()->back();

        }
        catch(\Exception $ex){
            DB::rollBack();
            Log::info($ex);
            Flash::error("An error occurred");
            dd("An error occurred");
//            return redirect()->back();
        }
    }

    public function showProcess(SchoolSessionRepository $schoolSession){
        $sessionArray=[""=>"Select Session"];
        $allSessions=$schoolSession->all();
        foreach ($allSessions as $session){
            $sessionArray[$session->id]=$session->session_name;
        }

        $semester=[
            ""=>"Select Semester",
            "1"=>"First Semester",
            "2"=>"Second Semester"
        ];

        return view("admin.result_processings.process",[
            "sessions"=>$sessionArray,
            "semester"=>$semester
        ]);
    }


    public function process(ResultProcessingRepository $resultProcessing){
        $session=Input::get("session_id");
        $semester_id=Input::get("semester_id");

        $v=Validator::make([
            "Session"=>$session,
            "Semester"=>$semester_id
        ],[
            "Session"=>"required",
            "Semester"=>"required"
        ]);

        if($semester_id==0 || $semester_id==""){
            Flash::error("Please select a valid session");
            return redirect()->back();
        }

        $sessionInfo=SchoolSession::find($session);
        $semester=$semester_id==1?"First Semester":"Second Semester";


        if($v->fails()){
            Flash::error($v->messages()->all());
            return redirect()->back();
        }

        //get all the occurrent of this session and semester
        $session_id=Input::get("session_id");
        $semester_id=Input::get("semester_id");

        $processingInfo=$resultProcessing->findWhere(["session_id"=>$session_id,
            "semester_id"=>$semester_id]);
        if(count($processingInfo)<=0){
            dd("Hello World!!");
            return redirect()->back();
        }
        $processingInfo=$processingInfo->first();
//        $details=DB::Raw("select distinct student_id from result_details");
        $students=ResultDetail::distinct()->get(["student_id"]);
        foreach ($students as $student){
            $studentInfo=Student::find($student->student_id);
            //lets get the details
            $details=ResultDetail::whereRaw("result_process_id=? and student_id=?",
                [$processingInfo->id,$student->student_id])->get();

            $totalUnits=0;
            $totalPoints=0;
            foreach ($details as $detail){
                $courseUnit=$detail->course->course_unit;
                $totalUnits+=$courseUnit;
                $totalPoints+=$this->getPoint($detail->score)*$courseUnit;
            }

            $gpa=$totalPoints/$totalUnits;
            $msg="Dear $studentInfo->matric_no, your GPA for $sessionInfo->session_name session and $semester is: "
                .number_format
                ($gpa,2);
            $email=$studentInfo->email;
            Mail::raw([], function($message) use($msg,$email) {
                $message->from('info@fpe-alert.com', 'FPE Notification');
                $message->to($email);
                $message->subject('Result Notification');
                $message->setBody( $msg );
            });

//            $this->dispatchNow(new SendNotification($message,$studentInfo->phone));
        }

//        dd("Hello World... all done");
        Flash::success("Notification sent to all students");
        return redirect()->back();
        //lets get all the students from this list
    }

    public function getPoint($score){
        $point=0.00;
        if($score>=75 && $score<=100){
            $point=3.50;
        }
        else if($score>=70 && $score<75){
            $point=3.00;
        }else if($score>=65 && $score<70){
            $point=2.75;
        }
        else if($score>=60 && $score<65){
            $point=2.50;
        }
        else if($score>=55 && $score<60){
            $point=2.00;
        }
        else if($score>=50 && $score<55){
            $point=1.50;
        }
        else if($score>=40 && $score<50){
            $point=1.00;
        }
        else if($score<40){
            $point=0.00;
        }

        return $point;
    }
}