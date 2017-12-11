<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ResultProcessing;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResultProcessingRepository
 * @package App\Repositories\Admin
 * @version November 8, 2017, 4:05 pm UTC
 *
 * @method ResultProcessing findWithoutFail($id, $columns = ['*'])
 * @method ResultProcessing find($id, $columns = ['*'])
 * @method ResultProcessing first($columns = ['*'])
*/
class ResultProcessingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'session_id',
        'semester_id',
        'course_id',
        'level_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ResultProcessing::class;
    }
}
