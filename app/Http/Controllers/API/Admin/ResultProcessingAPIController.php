<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateResultProcessingAPIRequest;
use App\Http\Requests\API\Admin\UpdateResultProcessingAPIRequest;
use App\Models\Admin\ResultProcessing;
use App\Repositories\Admin\ResultProcessingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ResultProcessingController
 * @package App\Http\Controllers\API\Admin
 */

class ResultProcessingAPIController extends AppBaseController
{
    /** @var  ResultProcessingRepository */
    private $resultProcessingRepository;

    public function __construct(ResultProcessingRepository $resultProcessingRepo)
    {
        $this->resultProcessingRepository = $resultProcessingRepo;
    }

    /**
     * Display a listing of the ResultProcessing.
     * GET|HEAD /resultProcessings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->resultProcessingRepository->pushCriteria(new RequestCriteria($request));
        $this->resultProcessingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $resultProcessings = $this->resultProcessingRepository->all();

        return $this->sendResponse($resultProcessings->toArray(), 'Result Processings retrieved successfully');
    }

    /**
     * Store a newly created ResultProcessing in storage.
     * POST /resultProcessings
     *
     * @param CreateResultProcessingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResultProcessingAPIRequest $request)
    {
        $input = $request->all();

        $resultProcessings = $this->resultProcessingRepository->create($input);

        return $this->sendResponse($resultProcessings->toArray(), 'Result Processing saved successfully');
    }

    /**
     * Display the specified ResultProcessing.
     * GET|HEAD /resultProcessings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ResultProcessing $resultProcessing */
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            return $this->sendError('Result Processing not found');
        }

        return $this->sendResponse($resultProcessing->toArray(), 'Result Processing retrieved successfully');
    }

    /**
     * Update the specified ResultProcessing in storage.
     * PUT/PATCH /resultProcessings/{id}
     *
     * @param  int $id
     * @param UpdateResultProcessingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultProcessingAPIRequest $request)
    {
        $input = $request->all();

        /** @var ResultProcessing $resultProcessing */
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            return $this->sendError('Result Processing not found');
        }

        $resultProcessing = $this->resultProcessingRepository->update($input, $id);

        return $this->sendResponse($resultProcessing->toArray(), 'ResultProcessing updated successfully');
    }

    /**
     * Remove the specified ResultProcessing from storage.
     * DELETE /resultProcessings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ResultProcessing $resultProcessing */
        $resultProcessing = $this->resultProcessingRepository->findWithoutFail($id);

        if (empty($resultProcessing)) {
            return $this->sendError('Result Processing not found');
        }

        $resultProcessing->delete();

        return $this->sendResponse($id, 'Result Processing deleted successfully');
    }
}
