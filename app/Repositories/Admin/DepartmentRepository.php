<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Department;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepartmentRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 9:22 pm UTC
 *
 * @method Department findWithoutFail($id, $columns = ['*'])
 * @method Department find($id, $columns = ['*'])
 * @method Department first($columns = ['*'])
*/
class DepartmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'school_id',
        'department',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Department::class;
    }
}
