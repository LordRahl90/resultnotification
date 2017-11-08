<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultProcessing
 * @package App\Models\Admin
 * @version November 7, 2017, 10:11 pm UTC
 *
 * @property integer student_id
 * @property integer session_id
 * @property string semester
 */
class ResultProcessing extends Model
{
    use SoftDeletes;

    public $table = 'result_processings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'student_id',
        'session_id',
        'semester'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_id' => 'integer',
        'session_id' => 'integer',
        'semester' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|numeric',
        'session_id' => 'required|numeric',
        'semester' => 'required'
    ];

    
}
