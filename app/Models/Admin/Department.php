<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Department
 * @package App\Models\Admin
 * @version November 7, 2017, 9:22 pm UTC
 *
 * @property integer school_id
 * @property string department
 * @property string slug
 */
class Department extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'departments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'school_id',
        'department',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'school_id' => 'integer',
        'department' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'school_id' => 'required|numeric',
        'department' => 'required'
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'department'
            ]
        ];
    }


}
