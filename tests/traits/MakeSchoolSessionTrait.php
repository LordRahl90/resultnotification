<?php

use Faker\Factory as Faker;
use App\Models\Admin\SchoolSession;
use App\Repositories\Admin\SchoolSessionRepository;

trait MakeSchoolSessionTrait
{
    /**
     * Create fake instance of SchoolSession and save it in database
     *
     * @param array $schoolSessionFields
     * @return SchoolSession
     */
    public function makeSchoolSession($schoolSessionFields = [])
    {
        /** @var SchoolSessionRepository $schoolSessionRepo */
        $schoolSessionRepo = App::make(SchoolSessionRepository::class);
        $theme = $this->fakeSchoolSessionData($schoolSessionFields);
        return $schoolSessionRepo->create($theme);
    }

    /**
     * Get fake instance of SchoolSession
     *
     * @param array $schoolSessionFields
     * @return SchoolSession
     */
    public function fakeSchoolSession($schoolSessionFields = [])
    {
        return new SchoolSession($this->fakeSchoolSessionData($schoolSessionFields));
    }

    /**
     * Get fake data of SchoolSession
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSchoolSessionData($schoolSessionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'session_name' => $fake->word,
            'active' => $fake->word,
            'slug' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $schoolSessionFields);
    }
}
