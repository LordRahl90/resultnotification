<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultDetail
 * @package App\Models\Admin
 * @version November 8, 2017, 4:08 pm UTC
 *
 * @property integer result_process_id
 * @property integer student_id
 * @property integer score
 */
class ResultDetail extends Model
{
    use SoftDeletes;

    public $table = 'result_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'result_process_id',
        'student_id',
        'score'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'result_process_id' => 'integer',
        'student_id' => 'integer',
        'score' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'result_process_id' => 'required',
        'student_id' => 'required',
        'score' => 'required'
    ];

    
}
