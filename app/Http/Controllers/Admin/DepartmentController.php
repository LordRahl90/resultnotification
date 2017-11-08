<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateDepartmentRequest;
use App\Http\Requests\Admin\UpdateDepartmentRequest;
use App\Repositories\Admin\DepartmentRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\SchoolRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DepartmentController extends AppBaseController
{
    /** @var  DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departmentRepository->pushCriteria(new RequestCriteria($request));
        $departments = $this->departmentRepository->all();

        return view('admin.departments.index')
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new Department.
     *
     * @return Response
     */
    public function create(SchoolRepository $schoolRepository)
    {
        $schoolsArrray=[
            ""=>"Select School"
        ];
        $schools=$schoolRepository->all();
        foreach ($schools as $school){
            $schoolsArrray[$school->id]=$school->school;
        }

        return view('admin.departments.create',['schools'=>$schoolsArrray]);
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param CreateDepartmentRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        Flash::success('Department saved successfully.');

        return redirect(route('admin.departments.index'));
    }

    /**
     * Display the specified Department.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('admin.departments.index'));
        }

        return view('admin.departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified Department.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('admin.departments.index'));
        }

        return view('admin.departments.edit')->with('department', $department);
    }

    /**
     * Update the specified Department in storage.
     *
     * @param  int              $id
     * @param UpdateDepartmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('admin.departments.index'));
        }

        $department = $this->departmentRepository->update($request->all(), $id);

        Flash::success('Department updated successfully.');

        return redirect(route('admin.departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('admin.departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success('Department deleted successfully.');

        return redirect(route('admin.departments.index'));
    }
}
