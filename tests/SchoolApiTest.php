<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolApiTest extends TestCase
{
    use MakeSchoolTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSchool()
    {
        $school = $this->fakeSchoolData();
        $this->json('POST', '/api/v1/schools', $school);

        $this->assertApiResponse($school);
    }

    /**
     * @test
     */
    public function testReadSchool()
    {
        $school = $this->makeSchool();
        $this->json('GET', '/api/v1/schools/'.$school->id);

        $this->assertApiResponse($school->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSchool()
    {
        $school = $this->makeSchool();
        $editedSchool = $this->fakeSchoolData();

        $this->json('PUT', '/api/v1/schools/'.$school->id, $editedSchool);

        $this->assertApiResponse($editedSchool);
    }

    /**
     * @test
     */
    public function testDeleteSchool()
    {
        $school = $this->makeSchool();
        $this->json('DELETE', '/api/v1/schools/'.$school->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/schools/'.$school->id);

        $this->assertResponseStatus(404);
    }
}
