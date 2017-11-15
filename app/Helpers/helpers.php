<?php

use App\Models\DailyLog;

if (! function_exists('get_user_checked_in')) {
    function get_user_checked_in($userId, $date)
    {
        return DailyLog::where('user_id', '=', $userId)
            ->whereDate('checked_in_at', '=', $date)->first();
    }
}
