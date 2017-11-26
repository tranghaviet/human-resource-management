<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use Carbon\Carbon;
use App\Models\DailyLog;
use App\Models\MonthlyLog;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDailyLogRequest;
use App\Repositories\DailyLogRepository;
use Prettus\Repository\Criteria\RequestCriteria;

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
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $dailyLogs = $this->dailyLogRepository->with('user')->paginate(20);
        } else {
            $dailyLogs = DailyLog::where('user_id', $user->id)->paginate(30);
        }

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

    public function checkIn()
    {
        $user = Auth::user();
        $now = Carbon::now();

        $userCheckedIn =  DailyLog::findByUserIdAndDate($user->id, $now->toDateString());

        if (! empty($userCheckedIn)) {
            Flash::success('You already checked-in.');
        } else {
            $input = [
                'user_id' => $user->id,
                'checked_in_at' => $now,
            ];

            $this->dailyLogRepository->create($input);

            Flash::success('Check-in successfully.');
        }

        return redirect(route('dailyLogs.index'));
    }

    public function checkOut()
    {
        $user = Auth::user();
        $now = Carbon::now();

        $userCheckedIn = DailyLog::findByUserIdAndDate($user->id, $now->toDateString());

        if (empty($userCheckedIn)) {
            Flash::warning("You haven't checked-in yet.");
        } else {
            $userCheckedIn->checked_out_at = $now;

            $userCheckedIn->working_hours = $now->diffInHours($userCheckedIn->checked_in_at);

            $userCheckedIn->save();

            Flash::success('Check-out successfully.');
        }

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
     * @param  int $id
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
