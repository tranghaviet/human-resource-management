<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\DailyLog;
use App\Models\MonthlyLog;

class DailyLogObserver
{
    /**
     * Listen to the DailyLog saving event.
     *
     * @param  DailyLog $dailyLog
     * @return void
     */
    public function saving(DailyLog $dailyLog)
    {
        $date = new Carbon($dailyLog->checked_in_at);
        $monthlyLog = MonthlyLog::findByUserIdAndDate($dailyLog->user_id, $date);

        if (empty($monthlyLog)) {
            $monthlyLog = MonthlyLog::create([
                'user_id' => $dailyLog->user_id,
                'date' => $date,
            ]);
        }

        $dailyLog->monthly_log_id = $monthlyLog->id;
    }

    /**
     * Listen to the DailyLog saved event.
     *
     * @param  DailyLog $dailyLog
     * @return void
     */
    public function saved(DailyLog $dailyLog)
    {
        MonthlyLog::computeByUserAndDate($dailyLog->user_id, new Carbon($dailyLog->checked_in_at));
    }
}
