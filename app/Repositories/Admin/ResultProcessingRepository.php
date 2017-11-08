<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ResultProcessing;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResultProcessingRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 10:11 pm UTC
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
        'student_id',
        'session_id',
        'semester'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ResultProcessing::class;
    }
}
