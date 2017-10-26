<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonthlyLogRequest;
use App\Http\Requests\UpdateMonthlyLogRequest;
use App\Repositories\MonthlyLogRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MonthlyLogController extends AppBaseController
{
    /** @var MonthlyLogRepository */
    private $monthlyLogRepository;

    public function __construct(MonthlyLogRepository $monthlyLogRepo)
    {
        $this->monthlyLogRepository = $monthlyLogRepo;
    }

    /**
     * Display a listing of the MonthlyLog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->monthlyLogRepository->pushCriteria(new RequestCriteria($request));
        $monthlyLogs = $this->monthlyLogRepository->all();

        return view('monthly_logs.index')
            ->with('monthlyLogs', $monthlyLogs);
    }

    /**
     * Show the form for creating a new MonthlyLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('monthly_logs.create');
    }

    /**
     * Store a newly created MonthlyLog in storage.
     *
     * @param CreateMonthlyLogRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlyLogRequest $request)
    {
        $input = $request->all();

        $monthlyLog = $this->monthlyLogRepository->create($input);

        Flash::success('Monthly Log saved successfully.');

        return redirect(route('monthlyLogs.index'));
    }

    /**
     * Display the specified MonthlyLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monthlyLog = $this->monthlyLogRepository->findWithoutFail($id);

        if (empty($monthlyLog)) {
            Flash::error('Monthly Log not found');

            return redirect(route('monthlyLogs.index'));
        }

        return view('monthly_logs.show')->with('monthlyLog', $monthlyLog);
    }

    /**
     * Show the form for editing the specified MonthlyLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monthlyLog = $this->monthlyLogRepository->findWithoutFail($id);

        if (empty($monthlyLog)) {
            Flash::error('Monthly Log not found');

            return redirect(route('monthlyLogs.index'));
        }

        return view('monthly_logs.edit')->with('monthlyLog', $monthlyLog);
    }

    /**
     * Update the specified MonthlyLog in storage.
     *
     * @param  int              $id
     * @param UpdateMonthlyLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlyLogRequest $request)
    {
        $monthlyLog = $this->monthlyLogRepository->findWithoutFail($id);

        if (empty($monthlyLog)) {
            Flash::error('Monthly Log not found');

            return redirect(route('monthlyLogs.index'));
        }

        $monthlyLog = $this->monthlyLogRepository->update($request->all(), $id);

        Flash::success('Monthly Log updated successfully.');

        return redirect(route('monthlyLogs.index'));
    }

    /**
     * Remove the specified MonthlyLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monthlyLog = $this->monthlyLogRepository->findWithoutFail($id);

        if (empty($monthlyLog)) {
            Flash::error('Monthly Log not found');

            return redirect(route('monthlyLogs.index'));
        }

        $this->monthlyLogRepository->delete($id);

        Flash::success('Monthly Log deleted successfully.');

        return redirect(route('monthlyLogs.index'));
    }
}
