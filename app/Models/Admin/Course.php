<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 * @package App\Models\Admin
 * @version November 7, 2017, 10:06 pm UTC
 *
 * @property string course_code
 * @property string course_name
 * @property integer course_unit
 * @property string slug
 */
class Course extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'courses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'course_code',
        'course_name',
        'course_unit',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'course_code' => 'string',
        'course_name' => 'string',
        'course_unit' => 'integer',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_code' => 'required|unique:courses,course_code',
        'course_name' => 'required',
        'course_unit' => 'required|numeric'
    ];


    public function sluggable()
    {
        return [
          'slug'=>[
              'source'=>'course_name'
          ]
        ];
    }

}
