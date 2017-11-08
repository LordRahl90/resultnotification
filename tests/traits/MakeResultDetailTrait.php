<?php

use Faker\Factory as Faker;
use App\Models\Admin\ResultDetail;
use App\Repositories\Admin\ResultDetailRepository;

trait MakeResultDetailTrait
{
    /**
     * Create fake instance of ResultDetail and save it in database
     *
     * @param array $resultDetailFields
     * @return ResultDetail
     */
    public function makeResultDetail($resultDetailFields = [])
    {
        /** @var ResultDetailRepository $resultDetailRepo */
        $resultDetailRepo = App::make(ResultDetailRepository::class);
        $theme = $this->fakeResultDetailData($resultDetailFields);
        return $resultDetailRepo->create($theme);
    }

    /**
     * Get fake instance of ResultDetail
     *
     * @param array $resultDetailFields
     * @return ResultDetail
     */
    public function fakeResultDetail($resultDetailFields = [])
    {
        return new ResultDetail($this->fakeResultDetailData($resultDetailFields));
    }

    /**
     * Get fake data of ResultDetail
     *
     * @param array $postFields
     * @return array
     */
    public function fakeResultDetailData($resultDetailFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'course_id' => $fake->randomDigitNotNull,
            'score' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $resultDetailFields);
    }
}
