<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models\Admin
 * @version November 8, 2017, 7:18 am UTC
 *
 * @property string username
 * @property string surname
 * @property string other_names
 * @property string email
 * @property string password
 */
//class User extends Model
class User extends Authenticatable
{
    use SoftDeletes;
//    use Authenticatable;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'username',
        'surname',
        'other_names',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'surname' => 'string',
        'other_names' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required|unique:users,username',
        'surname' => 'required',
        'other_names' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    
}
