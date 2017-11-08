<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSchoolRequest;
use App\Http\Requests\Admin\UpdateSchoolRequest;
use App\Repositories\Admin\SchoolRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SchoolController extends AppBaseController
{
    /** @var  SchoolRepository */
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Display a listing of the School.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->schoolRepository->pushCriteria(new RequestCriteria($request));
        $schools = $this->schoolRepository->all();

        return view('admin.schools.index')
            ->with('schools', $schools);
    }

    /**
     * Show the form for creating a new School.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.schools.create');
    }

    /**
     * Store a newly created School in storage.
     *
     * @param CreateSchoolRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolRequest $request)
    {
        $input = $request->all();

        $school = $this->schoolRepository->create($input);

        Flash::success('School saved successfully.');

        return redirect(route('admin.schools.index'));
    }

    /**
     * Display the specified School.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $school = $this->schoolRepository->findWithoutFail($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('admin.schools.index'));
        }

        return view('admin.schools.show')->with('school', $school);
    }

    /**
     * Show the form for editing the specified School.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $school = $this->schoolRepository->findWithoutFail($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('admin.schools.index'));
        }

        return view('admin.schools.edit')->with('school', $school);
    }

    /**
     * Update the specified School in storage.
     *
     * @param  int              $id
     * @param UpdateSchoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolRequest $request)
    {
        $school = $this->schoolRepository->findWithoutFail($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('admin.schools.index'));
        }

        $school = $this->schoolRepository->update($request->all(), $id);

        Flash::success('School updated successfully.');

        return redirect(route('admin.schools.index'));
    }

    /**
     * Remove the specified School from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $school = $this->schoolRepository->findWithoutFail($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('admin.schools.index'));
        }

        $this->schoolRepository->delete($id);

        Flash::success('School deleted successfully.');

        return redirect(route('admin.schools.index'));
    }
}
