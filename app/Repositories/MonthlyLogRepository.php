<?php

namespace App\Repositories;

use App\Models\MonthlyLog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MonthlyLogRepository
 * @package App\Repositories
 * @version October 26, 2017, 5:32 pm UTC
 *
 * @method MonthlyLog findWithoutFail($id, $columns = ['*'])
 * @method MonthlyLog find($id, $columns = ['*'])
 * @method MonthlyLog first($columns = ['*'])
 */

class MonthlyLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return MonthlyLog::class;
    }
}
