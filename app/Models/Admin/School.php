<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class School
 * @package App\Models\Admin
 * @version November 7, 2017, 9:13 pm UTC
 *
 * @property string school
 * @property string slug
 */
class School extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'schools';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'school',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'school' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'school' => 'required'
    ];


    public function sluggable(): array
    {
        return [
          'slug'=>[
              'source'=>'school'
          ]
        ];
    }


}
