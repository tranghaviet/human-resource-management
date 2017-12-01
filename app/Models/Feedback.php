<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Feedback.
 * @package App\Models
 * @version October 26, 2017, 5:40 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\User replyUser
 * @property \Illuminate\Database\Eloquent\Collection dailyLogs
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer user_id
 * @property string content
 * @property string reply
 * @property boolean is_resolved
 * @property integer replied_user_id
 * @property string|\Carbon\Carbon replied_at
 */

class Feedback extends Model
{
    public $table = 'feedback';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'content',
        'reply',
        'is_resolved',
        'replied_user_id',
        'replied_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'content' => 'string',
        'reply' => 'string',
        'is_resolved' => 'boolean',
        'replied_user_id' => 'integer'
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
    public function replyUser()
    {
        //return $this->hasOne(\App\Models\User::class, 'id', 'replied_user_id');
        return $this->belongsTo(\App\Models\User::class, 'replied_user_id', 'id');
    }
}
