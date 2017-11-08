<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultDetail
 * @package App\Models\Admin
 * @version November 7, 2017, 10:16 pm UTC
 *
 * @property integer course_id
 * @property integer score
 */
class ResultDetail extends Model
{
    use SoftDeletes;

    public $table = 'result_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'course_id',
        'score'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'course_id' => 'integer',
        'score' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_id' => 'required',
        'score' => 'exit'
    ];

    
}
