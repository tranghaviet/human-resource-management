<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDailyLogRequest;
use App\Http\Requests\UpdateDailyLogRequest;
use App\Repositories\DailyLogRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DailyLogController extends AppBaseController
{
    /** @var DailyLogRepository */
    private $dailyLogRepository;

    public function __construct(DailyLogRepository $dailyLogRepo)
    {
        $this->dailyLogRepository = $dailyLogRepo;
    }

    /**
     * Display a listing of the DailyLog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dailyLogRepository->pushCriteria(new RequestCriteria($request));
        $dailyLogs = $this->dailyLogRepository->all();

        return view('daily_logs.index')
            ->with('dailyLogs', $dailyLogs);
    }

    /**
     * Show the form for creating a new DailyLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('daily_logs.create');
    }

    /**
     * Store a newly created DailyLog in storage.
     *
     * @param CreateDailyLogRequest $request
     *
     * @return Response
     */
    public function store(CreateDailyLogRequest $request)
    {
        $input = $request->all();

        $dailyLog = $this->dailyLogRepository->create($input);

        Flash::success('Daily Log saved successfully.');

        return redirect(route('dailyLogs.index'));
    }

    /**
     * Display the specified DailyLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dailyLog = $this->dailyLogRepository->findWithoutFail($id);

        if (empty($dailyLog)) {
            Flash::error('Daily Log not found');

            return redirect(route('dailyLogs.index'));
        }

        return view('daily_logs.show')->with('dailyLog', $dailyLog);
    }

    /**
     * Show the form for editing the specified DailyLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dailyLog = $this->dailyLogRepository->findWithoutFail($id);

        if (empty($dailyLog)) {
            Flash::error('Daily Log not found');

            return redirect(route('dailyLogs.index'));
        }

        return view('daily_logs.edit')->with('dailyLog', $dailyLog);
    }

    /**
     * Update the specified DailyLog in storage.
     *
     * @param  int              $id
     * @param UpdateDailyLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDailyLogRequest $request)
    {
        $dailyLog = $this->dailyLogRepository->findWithoutFail($id);

        if (empty($dailyLog)) {
            Flash::error('Daily Log not found');

            return redirect(route('dailyLogs.index'));
        }

        $dailyLog = $this->dailyLogRepository->update($request->all(), $id);

        Flash::success('Daily Log updated successfully.');

        return redirect(route('dailyLogs.index'));
    }

    /**
     * Remove the specified DailyLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dailyLog = $this->dailyLogRepository->findWithoutFail($id);

        if (empty($dailyLog)) {
            Flash::error('Daily Log not found');

            return redirect(route('dailyLogs.index'));
        }

        $this->dailyLogRepository->delete($id);

        Flash::success('Daily Log deleted successfully.');

        return redirect(route('dailyLogs.index'));
    }
}
