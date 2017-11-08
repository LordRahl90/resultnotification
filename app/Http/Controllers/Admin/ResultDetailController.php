<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateResultDetailRequest;
use App\Http\Requests\Admin\UpdateResultDetailRequest;
use App\Repositories\Admin\ResultDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ResultDetailController extends AppBaseController
{
    /** @var  ResultDetailRepository */
    private $resultDetailRepository;

    public function __construct(ResultDetailRepository $resultDetailRepo)
    {
        $this->resultDetailRepository = $resultDetailRepo;
    }

    /**
     * Display a listing of the ResultDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->resultDetailRepository->pushCriteria(new RequestCriteria($request));
        $resultDetails = $this->resultDetailRepository->all();

        return view('admin.result_details.index')
            ->with('resultDetails', $resultDetails);
    }

    /**
     * Show the form for creating a new ResultDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.result_details.create');
    }

    /**
     * Store a newly created ResultDetail in storage.
     *
     * @param CreateResultDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateResultDetailRequest $request)
    {
        $input = $request->all();

        $resultDetail = $this->resultDetailRepository->create($input);

        Flash::success('Result Detail saved successfully.');

        return redirect(route('admin.resultDetails.index'));
    }

    /**
     * Display the specified ResultDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            Flash::error('Result Detail not found');

            return redirect(route('admin.resultDetails.index'));
        }

        return view('admin.result_details.show')->with('resultDetail', $resultDetail);
    }

    /**
     * Show the form for editing the specified ResultDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            Flash::error('Result Detail not found');

            return redirect(route('admin.resultDetails.index'));
        }

        return view('admin.result_details.edit')->with('resultDetail', $resultDetail);
    }

    /**
     * Update the specified ResultDetail in storage.
     *
     * @param  int              $id
     * @param UpdateResultDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultDetailRequest $request)
    {
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            Flash::error('Result Detail not found');

            return redirect(route('admin.resultDetails.index'));
        }

        $resultDetail = $this->resultDetailRepository->update($request->all(), $id);

        Flash::success('Result Detail updated successfully.');

        return redirect(route('admin.resultDetails.index'));
    }

    /**
     * Remove the specified ResultDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $resultDetail = $this->resultDetailRepository->findWithoutFail($id);

        if (empty($resultDetail)) {
            Flash::error('Result Detail not found');

            return redirect(route('admin.resultDetails.index'));
        }

        $this->resultDetailRepository->delete($id);

        Flash::success('Result Detail deleted successfully.');

        return redirect(route('admin.resultDetails.index'));
    }
}
