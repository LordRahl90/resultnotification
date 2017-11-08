<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Level
 * @package App\Models\Admin
 * @version November 7, 2017, 9:34 pm UTC
 *
 * @property string level
 * @property string slug
 */
class Level extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'levels';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'level',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'level' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'level' => 'required'
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'level'
            ]
        ];
    }


}
