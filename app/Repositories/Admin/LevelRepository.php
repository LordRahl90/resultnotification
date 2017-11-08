<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Level;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LevelRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 9:34 pm UTC
 *
 * @method Level findWithoutFail($id, $columns = ['*'])
 * @method Level find($id, $columns = ['*'])
 * @method Level first($columns = ['*'])
*/
class LevelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'level',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Level::class;
    }
}
