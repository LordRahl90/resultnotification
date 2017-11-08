<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ResultDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResultDetailRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 10:16 pm UTC
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
        'course_id',
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
