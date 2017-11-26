<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Department.
 * @package App\Models
 * @version October 26, 2017, 5:00 pm UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection dailyLogs
 * @property \Illuminate\Database\Eloquent\Collection feedback
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string name
 * @property integer manager_id
 */
class Department extends Model
{
    public $table = 'departments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'manager_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'manager_id' => 'integer'
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
    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
