<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class RoleUser.
 * @package App\Models
 * @version October 26, 2017, 5:52 pm UTC
 *
 * @property \App\Models\Role role
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection dailyLogs
 * @property \Illuminate\Database\Eloquent\Collection feedback
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property integer role_id
 */

class RoleUser extends Model
{
    public $table = 'role_user';
    
    public $fillable = [
        'role_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'role_id' => 'integer'
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
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
