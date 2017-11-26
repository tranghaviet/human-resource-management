<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\MonthlyLog;
use Illuminate\Http\Request;
use App\Repositories\MonthlyLogRepository;
use App\Http\Requests\CreateMonthlyLogRequest;
use App\Http\Requests\UpdateMonthlyLogRequest;
use Prettus\Repository\Criteria\RequestCriteria;

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
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $monthlyLogs = $this->monthlyLogRepository->with('user')->paginate(30);
        } else {
            $monthlyLogs = MonthlyLog::where('user_id', $user->id)->with('user')->paginate(30);
        }

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

    public function getSetReward() {
        $userOptions = [];
        $users = User::all();

        foreach ($users as $user) {
            $userOptions[$user->id] = $user->name;
        }

        $monthOptions = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
        ];

        return view('monthly_logs.setReward', compact('userOptions', 'monthOptions'));
    }

    public function setReward(Request $request) {
        $date = new Carbon();
        $date->year = $request->year;
        $date->month = $request->month;

        if ($request->reward < 0) {
            Flash::error('Reward must greater than zero.');
            return redirect(route('monthlyLogs.getSetReward'));
        }

        $monthlyLog = MonthlyLog::findByUserIdAndDate($request->user_id, $date);

        if (empty($monthlyLog)) {
            Flash::error('No time found.');
            return redirect(route('monthlyLogs.getSetReward'));
        }

        $monthlyLog->reward = $request->reward;
        $monthlyLog->total_salary += $request->reward;
        $monthlyLog->save();

        Flash::success('Reward set successfully.');
        return redirect(route('monthlyLogs.index'));
    }
}
