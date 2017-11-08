<?php

use Faker\Factory as Faker;
use App\Models\Admin\Department;
use App\Repositories\Admin\DepartmentRepository;

trait MakeDepartmentTrait
{
    /**
     * Create fake instance of Department and save it in database
     *
     * @param array $departmentFields
     * @return Department
     */
    public function makeDepartment($departmentFields = [])
    {
        /** @var DepartmentRepository $departmentRepo */
        $departmentRepo = App::make(DepartmentRepository::class);
        $theme = $this->fakeDepartmentData($departmentFields);
        return $departmentRepo->create($theme);
    }

    /**
     * Get fake instance of Department
     *
     * @param array $departmentFields
     * @return Department
     */
    public function fakeDepartment($departmentFields = [])
    {
        return new Department($this->fakeDepartmentData($departmentFields));
    }

    /**
     * Get fake data of Department
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDepartmentData($departmentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'school_id' => $fake->randomDigitNotNull,
            'department' => $fake->word,
            'slug' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $departmentFields);
    }
}
