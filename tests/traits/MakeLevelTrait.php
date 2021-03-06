<?php

use Faker\Factory as Faker;
use App\Models\Admin\Level;
use App\Repositories\Admin\LevelRepository;

trait MakeLevelTrait
{
    /**
     * Create fake instance of Level and save it in database
     *
     * @param array $levelFields
     * @return Level
     */
    public function makeLevel($levelFields = [])
    {
        /** @var LevelRepository $levelRepo */
        $levelRepo = App::make(LevelRepository::class);
        $theme = $this->fakeLevelData($levelFields);
        return $levelRepo->create($theme);
    }

    /**
     * Get fake instance of Level
     *
     * @param array $levelFields
     * @return Level
     */
    public function fakeLevel($levelFields = [])
    {
        return new Level($this->fakeLevelData($levelFields));
    }

    /**
     * Get fake data of Level
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLevelData($levelFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'level' => $fake->word,
            'slug' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $levelFields);
    }
}
