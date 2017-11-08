<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Models\Admin
 * @version November 7, 2017, 9:47 pm UTC
 *
 * @property string matric_no
 * @property string surname
 * @property string other_names
 * @property string email
 * @property string phone
 */
class Student extends Model
{
    use SoftDeletes;

    public $table = 'students';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'matric_no',
        'surname',
        'other_names',
        'email',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matric_no' => 'string',
        'surname' => 'string',
        'other_names' => 'string',
        'email' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matric_no' => 'required',
        'surname' => 'required',
        'other_names' => 'required',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|unique:students,phone'
    ];

    
}
