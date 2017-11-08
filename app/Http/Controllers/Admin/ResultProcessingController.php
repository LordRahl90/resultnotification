<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateResultProcessingRequest;
use App\Http\Requests\Admin\UpdateResultProcessingRequest;
use App\Repositories\Admin\ResultProcessingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
     * @return Response
     */
    public function create()
    {
        return view('admin.result_processings.create');
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
}
