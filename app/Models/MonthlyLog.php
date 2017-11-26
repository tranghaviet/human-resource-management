<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;

/**
 * Class MonthlyLog.
 *
 * @package App\Models
 * @version November 25, 2017, 1:30 pm UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection dailyLogs
 * @property \Illuminate\Database\Eloquent\Collection feedback
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer user_id
 * @property \Carbon\Carbon date
 * @property float overtime_hours
 * @property integer days_off
 * @property integer total_base_salary
 * @property integer over_salary
 * @property integer reward
 * @property integer total_salary
 */
class MonthlyLog extends Model
{
    public $table = 'monthly_logs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'date',
        'overtime_hours',
        'days_off',
        'total_base_salary',
        'over_salary',
        'reward',
        'total_salary',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'overtime_hours' => 'float',
        'days_off' => 'integer',
        'total_base_salary' => 'integer',
        'over_salary' => 'integer',
        'reward' => 'integer',
        'total_salary' => 'integer',
    ];

    protected $dates = ['date'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Find MonthlyLog by given user id and date.
     *
     * @param int $userId
     * @param \Carbon\Carbon $date
     * @return MonthlyLog
     */
    public static function findByUserIdAndDate($userId, Carbon $date)
    {
        return MonthlyLog::where('user_id', $userId)
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)->first();
    }

    /**
     * Compute monthly log base on user/user id and date.
     *
     * @param  int $userId
     * @param  Carbon $date date in parameter will be set to 1
     * @return null | \App\Models\MonthlyLog
     */
    public static function computeByUserAndDate($user, Carbon $date)
    {
        if (is_int($user)) {
            $user_id = $user;
            $base_salary = User::find($user_id)->base_salary;
        } else {
            $user_id = $user->id;
            $base_salary = $user->base_salary;
        }

        $date->day = 1;
        $overtime_hours = 0;
        $dailyLogs = DailyLog::findByUserIdAndMonthYear($user_id, $date);

        if (empty($dailyLogs)) {
            return NULL;
        }

        foreach ($dailyLogs as $dailyLog) {
            if ($dailyLog->working_hours > 8) {
                $overtime_hours += $dailyLog->working_hours - 8;
            }
        }

        $total_base_salary = $dailyLogs->count() * $base_salary;
        $over_salary = $overtime_hours * $base_salary;
        $total_salary = $total_base_salary + $over_salary;
        $days_off = working_days_in_month($date->year, $date->month) - $dailyLogs->count();

        $monthlyLogInput = array_merge(compact('user_id', 'overtime_hours', 'days_off', 'total_base_salary', 'over_salary', 'total_salary'),
            [
                'date' => $date->toDateString(),
                'reward' => 0,
            ]);

        $monthlyLog = MonthlyLog::find($dailyLogs[0]->monthly_log_id);
        $monthlyLog->update($monthlyLogInput);

        return $monthlyLog;
    }
}
