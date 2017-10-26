<?php

namespace App\Repositories;

use App\Models\Feedback;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FeedbackRepository
 * @package App\Repositories
 * @version October 26, 2017, 5:40 pm UTC
 *
 * @method Feedback findWithoutFail($id, $columns = ['*'])
 * @method Feedback find($id, $columns = ['*'])
 * @method Feedback first($columns = ['*'])
 */

class FeedbackRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'content',
        'reply',
        'is_resolved',
        'replied_user_id',
        'replied_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Feedback::class;
    }
}
