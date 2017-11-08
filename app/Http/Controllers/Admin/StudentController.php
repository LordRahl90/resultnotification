<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;
use App\Repositories\Admin\StudentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StudentController extends AppBaseController
{
    /** @var  StudentRepository */
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Student.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->studentRepository->pushCriteria(new RequestCriteria($request));
        $students = $this->studentRepository->all();

        return view('admin.students.index')
            ->with('students', $students);
    }

    /**
     * Show the form for creating a new Student.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();

        $student = $this->studentRepository->create($input);

        Flash::success('Student saved successfully.');

        return redirect(route('admin.students.index'));
    }

    /**
     * Display the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('admin.students.index'));
        }

        return view('admin.students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('admin.students.index'));
        }

        return view('admin.students.edit')->with('student', $student);
    }

    /**
     * Update the specified Student in storage.
     *
     * @param  int              $id
     * @param UpdateStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentRequest $request)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('admin.students.index'));
        }

        $student = $this->studentRepository->update($request->all(), $id);

        Flash::success('Student updated successfully.');

        return redirect(route('admin.students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('admin.students.index'));
        }

        $this->studentRepository->delete($id);

        Flash::success('Student deleted successfully.');

        return redirect(route('admin.students.index'));
    }



    public function showUpload(){
        return view('admin.students.upload');
    }


    /**
     * Manages the upload of the file
     */
    public function upload(){
        $studentsList=Input::file('students');

        if($studentsList==null){
            Flash::error('Student not found');

            return redirect(route('admin.students.index'));
        }

        $destination=time().'_'.$studentsList->getClientOriginalExtension();
        $studentsList->move(public_path('students'),$destination);

        return $this->loadToDataBase(public_path("students")."/".$destination);
    }


    public function loadToDataBase($file){
        Excel::load($file, function($reader){
            $results=$reader->get();

            foreach ($results as $result){
                $matric=$result->matric;
                $surname=$result->surname;
                $othernames=$result->othernames;
                $email=$result->email;
                $phone=$result->phone;

                $data=$result->toArray();
                $rules=[
                    'matric'=>'required|unique:students,matric_no',
                    'surname'=>'required',
                    'othernames'=>'required',
                    'email'=>'required|email|unique:students,email',
                    'phone'=>'required|unique:students,phone'
                ];

                $v=Validator::make($data,$rules);

                if($v->fails()){
                    Log::info($v->messages()->all());
                    continue;
                }

                $newStudent=$this->studentRepository->create([
                    'matric_no'=>$matric,
                    'surname'=>$surname,
                    'other_names'=>$othernames,
                    'email'=>$email,
                    'phone'=>$phone
                ]);

                if(!$newStudent){
                    $this->sendError("An error occurred");
                }
            }
        });


        dd("All records saved");
    }
}
