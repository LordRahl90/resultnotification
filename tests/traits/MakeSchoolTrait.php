<?php

use Faker\Factory as Faker;
use App\Models\Admin\School;
use App\Repositories\Admin\SchoolRepository;

trait MakeSchoolTrait
{
    /**
     * Create fake instance of School and save it in database
     *
     * @param array $schoolFields
     * @return School
     */
    public function makeSchool($schoolFields = [])
    {
        /** @var SchoolRepository $schoolRepo */
        $schoolRepo = App::make(SchoolRepository::class);
        $theme = $this->fakeSchoolData($schoolFields);
        return $schoolRepo->create($theme);
    }

    /**
     * Get fake instance of School
     *
     * @param array $schoolFields
     * @return School
     */
    public function fakeSchool($schoolFields = [])
    {
        return new School($this->fakeSchoolData($schoolFields));
    }

    /**
     * Get fake data of School
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSchoolData($schoolFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'school' => $fake->word,
            'slug' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $schoolFields);
    }
}
