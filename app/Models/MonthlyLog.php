<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MonthlyLog.
 * @package App\Models
 * @version October 26, 2017, 5:32 pm UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection dailyLogs
 * @property \Illuminate\Database\Eloquent\Collection feedback
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer user_id
 * @property date month_year
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
        'month_year',
        'overtime_hours',
        'days_off',
        'total_base_salary',
        'over_salary',
        'reward',
        'total_salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'month_year' => 'date',
        'overtime_hours' => 'float',
        'days_off' => 'integer',
        'total_base_salary' => 'integer',
        'over_salary' => 'integer',
        'reward' => 'integer',
        'total_salary' => 'integer'
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
}
