<?php

namespace App\Repositories;

use App\Models\DailyLog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DailyLogRepository
 * @package App\Repositories
 * @version October 26, 2017, 5:33 pm UTC
 *
 * @method DailyLog findWithoutFail($id, $columns = ['*'])
 * @method DailyLog find($id, $columns = ['*'])
 * @method DailyLog first($columns = ['*'])
 */

class DailyLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'checked_in_at',
        'checked_out_at',
        'working_hours',
        'monthly_log_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DailyLog::class;
    }
}
