<?php

use Faker\Factory as Faker;
use App\Models\Admin\Student;
use App\Repositories\Admin\StudentRepository;

trait MakeStudentTrait
{
    /**
     * Create fake instance of Student and save it in database
     *
     * @param array $studentFields
     * @return Student
     */
    public function makeStudent($studentFields = [])
    {
        /** @var StudentRepository $studentRepo */
        $studentRepo = App::make(StudentRepository::class);
        $theme = $this->fakeStudentData($studentFields);
        return $studentRepo->create($theme);
    }

    /**
     * Get fake instance of Student
     *
     * @param array $studentFields
     * @return Student
     */
    public function fakeStudent($studentFields = [])
    {
        return new Student($this->fakeStudentData($studentFields));
    }

    /**
     * Get fake data of Student
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStudentData($studentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'matric_no' => $fake->word,
            'surname' => $fake->word,
            'other_names' => $fake->word,
            'email' => $fake->word,
            'phone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $studentFields);
    }
}
