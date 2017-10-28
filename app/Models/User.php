<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 * @package App\Models
 * @version October 26, 2017, 5:18 pm UTC
 *
 * @property \App\Models\Department department
 * @property \Illuminate\Database\Eloquent\Collection DailyLog
 * @property \Illuminate\Database\Eloquent\Collection Department
 * @property \Illuminate\Database\Eloquent\Collection Feedback
 * @property \Illuminate\Database\Eloquent\Collection MonthlyLog
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 * @property string email
 * @property string password
 * @property string gender
 * @property string phone
 * @property string address
 * @property integer base_salary
 * @property integer department_id
 * @property string remember_token
 */

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'address',
        'base_salary',
        'department_id',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'gender' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'base_salary' => 'integer',
        'department_id' => 'integer',
        'remember_token' => 'string'
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
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dailyLogs()
    {
        return $this->hasMany(\App\Models\DailyLog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function departments()
    {
        return $this->hasMany(\App\Models\Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function feedback()
    {
        return $this->hasMany(\App\Models\Feedback::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function monthlyLogs()
    {
        return $this->hasMany(\App\Models\MonthlyLog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_user');
    }
}
