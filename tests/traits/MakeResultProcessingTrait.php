<?php

use Faker\Factory as Faker;
use App\Models\Admin\ResultProcessing;
use App\Repositories\Admin\ResultProcessingRepository;

trait MakeResultProcessingTrait
{
    /**
     * Create fake instance of ResultProcessing and save it in database
     *
     * @param array $resultProcessingFields
     * @return ResultProcessing
     */
    public function makeResultProcessing($resultProcessingFields = [])
    {
        /** @var ResultProcessingRepository $resultProcessingRepo */
        $resultProcessingRepo = App::make(ResultProcessingRepository::class);
        $theme = $this->fakeResultProcessingData($resultProcessingFields);
        return $resultProcessingRepo->create($theme);
    }

    /**
     * Get fake instance of ResultProcessing
     *
     * @param array $resultProcessingFields
     * @return ResultProcessing
     */
    public function fakeResultProcessing($resultProcessingFields = [])
    {
        return new ResultProcessing($this->fakeResultProcessingData($resultProcessingFields));
    }

    /**
     * Get fake data of ResultProcessing
     *
     * @param array $postFields
     * @return array
     */
    public function fakeResultProcessingData($resultProcessingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'student_id' => $fake->randomDigitNotNull,
            'session_id' => $fake->randomDigitNotNull,
            'semester' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $resultProcessingFields);
    }
}
