<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ResultDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResultDetailRepository
 * @package App\Repositories\Admin
 * @version November 8, 2017, 4:08 pm UTC
 *
 * @method ResultDetail findWithoutFail($id, $columns = ['*'])
 * @method ResultDetail find($id, $columns = ['*'])
 * @method ResultDetail first($columns = ['*'])
*/
class ResultDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'result_process_id',
        'student_id',
        'score'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ResultDetail::class;
    }
}
