<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLevelRequest;
use App\Http\Requests\Admin\UpdateLevelRequest;
use App\Repositories\Admin\LevelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LevelController extends AppBaseController
{
    /** @var  LevelRepository */
    private $levelRepository;

    public function __construct(LevelRepository $levelRepo)
    {
        $this->levelRepository = $levelRepo;
    }

    /**
     * Display a listing of the Level.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->levelRepository->pushCriteria(new RequestCriteria($request));
        $levels = $this->levelRepository->all();

        return view('admin.levels.index')
            ->with('levels', $levels);
    }

    /**
     * Show the form for creating a new Level.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created Level in storage.
     *
     * @param CreateLevelRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelRequest $request)
    {
        $input = $request->all();

        $level = $this->levelRepository->create($input);

        Flash::success('Level saved successfully.');

        return redirect(route('admin.levels.index'));
    }

    /**
     * Display the specified Level.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $level = $this->levelRepository->findWithoutFail($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('admin.levels.index'));
        }

        return view('admin.levels.show')->with('level', $level);
    }

    /**
     * Show the form for editing the specified Level.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $level = $this->levelRepository->findWithoutFail($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('admin.levels.index'));
        }

        return view('admin.levels.edit')->with('level', $level);
    }

    /**
     * Update the specified Level in storage.
     *
     * @param  int              $id
     * @param UpdateLevelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelRequest $request)
    {
        $level = $this->levelRepository->findWithoutFail($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('admin.levels.index'));
        }

        $level = $this->levelRepository->update($request->all(), $id);

        Flash::success('Level updated successfully.');

        return redirect(route('admin.levels.index'));
    }

    /**
     * Remove the specified Level from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $level = $this->levelRepository->findWithoutFail($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('admin.levels.index'));
        }

        $this->levelRepository->delete($id);

        Flash::success('Level deleted successfully.');

        return redirect(route('admin.levels.index'));
    }
}
