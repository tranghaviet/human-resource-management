<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class RolePermission.
 * @package App\Models
 * @version October 26, 2017, 5:51 pm UTC
 *
 * @property \App\Models\Permission permission
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection dailyLogs
 * @property \Illuminate\Database\Eloquent\Collection feedback
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer role_id
 */

class PermissionRole extends Model
{
    public $table = 'permission_role';
    
    public $fillable = [
        'permission_id',
        'role_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'permission_id' => 'integer',
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
    public function permission()
    {
        return $this->belongsTo(\App\Models\Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }
}
