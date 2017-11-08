<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SchoolSession;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SchoolSessionRepository
 * @package App\Repositories\Admin
 * @version November 7, 2017, 9:44 pm UTC
 *
 * @method SchoolSession findWithoutFail($id, $columns = ['*'])
 * @method SchoolSession find($id, $columns = ['*'])
 * @method SchoolSession first($columns = ['*'])
*/
class SchoolSessionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'session_name',
        'active',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SchoolSession::class;
    }
}
