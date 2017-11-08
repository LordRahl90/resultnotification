<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Student;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StudentRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 9:47 pm UTC
 *
 * @method Student findWithoutFail($id, $columns = ['*'])
 * @method Student find($id, $columns = ['*'])
 * @method Student first($columns = ['*'])
*/
class StudentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matric_no',
        'surname',
        'other_names',
        'email',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Student::class;
    }
}
