<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultProcessing
 * @package App\Models\Admin
 * @version November 8, 2017, 4:05 pm UTC
 *
 * @property integer session_id
 * @property integer semester_id
 * @property integer course_id
 * @property integer level_id
 */
class ResultProcessing extends Model
{
    use SoftDeletes;

    public $table = 'result_processings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'session_id',
        'semester_id',
        'level_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'session_id' => 'integer',
        'semester_id' => 'integer',
        'level_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'session_id' => 'required',
        'semester_id' => 'course_id integer:unsigned:foreign,courses,id text',
        'course_id' => 'required',
        'level_id' => 'required'
    ];


    public function details(){
        return $this->hasMany('App\Models\Admin\ResultDetail',"result_process_id","id");
    }

    public function course(){
        return $this->hasOne('App\Models\Admin\Course','id','course_id');
    }

    
}
