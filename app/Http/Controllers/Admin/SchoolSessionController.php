<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSchoolSessionRequest;
use App\Http\Requests\Admin\UpdateSchoolSessionRequest;
use App\Repositories\Admin\SchoolSessionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SchoolSessionController extends AppBaseController
{
    /** @var  SchoolSessionRepository */
    private $schoolSessionRepository;

    public function __construct(SchoolSessionRepository $schoolSessionRepo)
    {
        $this->schoolSessionRepository = $schoolSessionRepo;
    }

    /**
     * Display a listing of the SchoolSession.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->schoolSessionRepository->pushCriteria(new RequestCriteria($request));
        $schoolSessions = $this->schoolSessionRepository->all();

        return view('admin.school_sessions.index')
            ->with('schoolSessions', $schoolSessions);
    }

    /**
     * Show the form for creating a new SchoolSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.school_sessions.create');
    }

    /**
     * Store a newly created SchoolSession in storage.
     *
     * @param CreateSchoolSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolSessionRequest $request)
    {
        $input = $request->all();

        $schoolSession = $this->schoolSessionRepository->create($input);

        Flash::success('School Session saved successfully.');

        return redirect(route('admin.schoolSessions.index'));
    }

    /**
     * Display the specified SchoolSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            Flash::error('School Session not found');

            return redirect(route('admin.schoolSessions.index'));
        }

        return view('admin.school_sessions.show')->with('schoolSession', $schoolSession);
    }

    /**
     * Show the form for editing the specified SchoolSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            Flash::error('School Session not found');

            return redirect(route('admin.schoolSessions.index'));
        }

        return view('admin.school_sessions.edit')->with('schoolSession', $schoolSession);
    }

    /**
     * Update the specified SchoolSession in storage.
     *
     * @param  int              $id
     * @param UpdateSchoolSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolSessionRequest $request)
    {
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            Flash::error('School Session not found');

            return redirect(route('admin.schoolSessions.index'));
        }

        $schoolSession = $this->schoolSessionRepository->update($request->all(), $id);

        Flash::success('School Session updated successfully.');

        return redirect(route('admin.schoolSessions.index'));
    }

    /**
     * Remove the specified SchoolSession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            Flash::error('School Session not found');

            return redirect(route('admin.schoolSessions.index'));
        }

        $this->schoolSessionRepository->delete($id);

        Flash::success('School Session deleted successfully.');

        return redirect(route('admin.schoolSessions.index'));
    }
}
