<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Course;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CourseRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 10:06 pm UTC
 *
 * @method Course findWithoutFail($id, $columns = ['*'])
 * @method Course find($id, $columns = ['*'])
 * @method Course first($columns = ['*'])
*/
class CourseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'course_code',
        'course_name',
        'course_unit',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Course::class;
    }
}
