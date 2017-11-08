<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class SchoolSession
 * @package App\Models\Admin
 * @version November 7, 2017, 9:44 pm UTC
 *
 * @property string session_name
 * @property boolean active
 * @property string slug
 */
class SchoolSession extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'school_sessions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'session_name',
        'active',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'session_name' => 'string',
        'active' => 'boolean',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'session_name' => 'required',
        'active' => 'required'
    ];


    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'session_name'
            ]
        ];
    }

}
