<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateSchoolSessionAPIRequest;
use App\Http\Requests\API\Admin\UpdateSchoolSessionAPIRequest;
use App\Models\Admin\SchoolSession;
use App\Repositories\Admin\SchoolSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SchoolSessionController
 * @package App\Http\Controllers\API\Admin
 */

class SchoolSessionAPIController extends AppBaseController
{
    /** @var  SchoolSessionRepository */
    private $schoolSessionRepository;

    public function __construct(SchoolSessionRepository $schoolSessionRepo)
    {
        $this->schoolSessionRepository = $schoolSessionRepo;
    }

    /**
     * Display a listing of the SchoolSession.
     * GET|HEAD /schoolSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->schoolSessionRepository->pushCriteria(new RequestCriteria($request));
        $this->schoolSessionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $schoolSessions = $this->schoolSessionRepository->all();

        return $this->sendResponse($schoolSessions->toArray(), 'School Sessions retrieved successfully');
    }

    /**
     * Store a newly created SchoolSession in storage.
     * POST /schoolSessions
     *
     * @param CreateSchoolSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolSessionAPIRequest $request)
    {
        $input = $request->all();

        $schoolSessions = $this->schoolSessionRepository->create($input);

        return $this->sendResponse($schoolSessions->toArray(), 'School Session saved successfully');
    }

    /**
     * Display the specified SchoolSession.
     * GET|HEAD /schoolSessions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SchoolSession $schoolSession */
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            return $this->sendError('School Session not found');
        }

        return $this->sendResponse($schoolSession->toArray(), 'School Session retrieved successfully');
    }

    /**
     * Update the specified SchoolSession in storage.
     * PUT/PATCH /schoolSessions/{id}
     *
     * @param  int $id
     * @param UpdateSchoolSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var SchoolSession $schoolSession */
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            return $this->sendError('School Session not found');
        }

        $schoolSession = $this->schoolSessionRepository->update($input, $id);

        return $this->sendResponse($schoolSession->toArray(), 'SchoolSession updated successfully');
    }

    /**
     * Remove the specified SchoolSession from storage.
     * DELETE /schoolSessions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SchoolSession $schoolSession */
        $schoolSession = $this->schoolSessionRepository->findWithoutFail($id);

        if (empty($schoolSession)) {
            return $this->sendError('School Session not found');
        }

        $schoolSession->delete();

        return $this->sendResponse($id, 'School Session deleted successfully');
    }
}
