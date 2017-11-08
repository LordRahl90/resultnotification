<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolSessionApiTest extends TestCase
{
    use MakeSchoolSessionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSchoolSession()
    {
        $schoolSession = $this->fakeSchoolSessionData();
        $this->json('POST', '/api/v1/schoolSessions', $schoolSession);

        $this->assertApiResponse($schoolSession);
    }

    /**
     * @test
     */
    public function testReadSchoolSession()
    {
        $schoolSession = $this->makeSchoolSession();
        $this->json('GET', '/api/v1/schoolSessions/'.$schoolSession->id);

        $this->assertApiResponse($schoolSession->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSchoolSession()
    {
        $schoolSession = $this->makeSchoolSession();
        $editedSchoolSession = $this->fakeSchoolSessionData();

        $this->json('PUT', '/api/v1/schoolSessions/'.$schoolSession->id, $editedSchoolSession);

        $this->assertApiResponse($editedSchoolSession);
    }

    /**
     * @test
     */
    public function testDeleteSchoolSession()
    {
        $schoolSession = $this->makeSchoolSession();
        $this->json('DELETE', '/api/v1/schoolSessions/'.$schoolSession->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/schoolSessions/'.$schoolSession->id);

        $this->assertResponseStatus(404);
    }
}
