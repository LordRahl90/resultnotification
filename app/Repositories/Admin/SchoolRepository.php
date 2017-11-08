<?php

namespace App\Repositories\Admin;

use App\Models\Admin\School;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SchoolRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 9:13 pm UTC
 *
 * @method School findWithoutFail($id, $columns = ['*'])
 * @method School find($id, $columns = ['*'])
 * @method School first($columns = ['*'])
*/
class SchoolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'school',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return School::class;
    }
}
