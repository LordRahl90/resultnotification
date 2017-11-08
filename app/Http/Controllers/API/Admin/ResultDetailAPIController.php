<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateResultDetailAPIRequest;
use App\Http\Requests\API\Admin\UpdateResultDetailAPIRequest;
use App\Models\Admin\ResultDetail;
use App\Repositories\Admin\ResultDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ResultDetailController
 * @package App\Http\Controllers\API\Admin
 */

class ResultDetailAPIController extends AppBaseController
{
    /** @var  ResultDetailRepository */
    private $resultDetailRepository;

    public function __construct(ResultDetailRepository $resultDetailRepo)
    {
        $this->resultDetailRepository = $resultDetailRepo;
    }

    /**
     * Display a listing of the ResultDetail.
     * GET|HEAD /resultDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->resultDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->resultDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $resultDetails = $this->resultDetailRepository->all();

        return $this->sendResponse($resultDetails->toArray(), 'Result Details retrieved successfully');
    }

    /**
     * Store a newly created ResultDetail in storage.
     * POST /resultDetails
     *
     * @param CreateResultDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResultDetailAPIRequest $request)
    {
        $input = $request->all();

        $resultDetails = $this->resultDetailRepository->create($input);

        return $this->sendResponse($resultDetails->toArray(), 'Result Detail saved successfully');
    }

    /**
     * Display the specified ResultDetail.
     * GET|HEAD /resultDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ResultDetail $resultDetail */
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            return $this->sendError('Result Detail not found');
        }

        return $this->sendResponse($resultDetail->toArray(), 'Result Detail retrieved successfully');
    }

    /**
     * Update the specified ResultDetail in storage.
     * PUT/PATCH /resultDetails/{id}
     *
     * @param  int $id
     * @param UpdateResultDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var ResultDetail $resultDetail */
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            return $this->sendError('Result Detail not found');
        }

        $resultDetail = $this->resultDetailRepository->update($input, $id);

        return $this->sendResponse($resultDetail->toArray(), 'ResultDetail updated successfully');
    }

    /**
     * Remove the specified ResultDetail from storage.
     * DELETE /resultDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ResultDetail $resultDetail */
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            return $this->sendError('Result Detail not found');
        }

        $resultDetail->delete();

        return $this->sendResponse($id, 'Result Detail deleted successfully');
    }
}
