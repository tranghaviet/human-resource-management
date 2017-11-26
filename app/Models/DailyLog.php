<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DailyLog.
 * @package App\Models
 * @version October 26, 2017, 5:33 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\MonthlyLog monthlyLog
 * @property \Illuminate\Database\Eloquent\Collection feedback
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer user_id
 * @property string|\Carbon\Carbon checked_in_at
 * @property string|\Carbon\Carbon checked_out_at
 * @property float working_hours
 * @property integer monthly_log_id
 */

class DailyLog extends Model
{
    public $table = 'daily_logs';

    public $fillable = [
        'user_id',
        'checked_in_at',
        'checked_out_at',
        'working_hours',
        'monthly_log_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'working_hours' => 'float',
        'monthly_log_id' => 'integer'
    ];

    protected $dates = [
        'checked_in_at',
        'checked_out_at',
    ];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function monthlyLog()
    {
        return $this->belongsTo(\App\Models\MonthlyLog::class);
    }

    /**
     * @param int $userId
     * @param string $date
     * @return DailyLog
     */
    public static function findByUserIdAndDate($userId, $date)
    {
        return DailyLog::where('user_id', $userId)
            ->whereDate('checked_in_at', $date)->first();
    }

    /**
     * @param int $userId
     * @param \Carbon\Carbon $date
     * @return DailyLog
     */
    public static function findByUserIdAndMonthYear($userId, \Carbon\Carbon $date)
    {
        return DailyLog::where('user_id', $userId)
            ->whereYear('checked_in_at', $date->year)
            ->whereMonth('checked_in_at', $date->month)->get();
    }


}
