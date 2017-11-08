<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResultProcessingApiTest extends TestCase
{
    use MakeResultProcessingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateResultProcessing()
    {
        $resultProcessing = $this->fakeResultProcessingData();
        $this->json('POST', '/api/v1/resultProcessings', $resultProcessing);

        $this->assertApiResponse($resultProcessing);
    }

    /**
     * @test
     */
    public function testReadResultProcessing()
    {
        $resultProcessing = $this->makeResultProcessing();
        $this->json('GET', '/api/v1/resultProcessings/'.$resultProcessing->id);

        $this->assertApiResponse($resultProcessing->toArray());
    }

    /**
     * @test
     */
    public function testUpdateResultProcessing()
    {
        $resultProcessing = $this->makeResultProcessing();
        $editedResultProcessing = $this->fakeResultProcessingData();

        $this->json('PUT', '/api/v1/resultProcessings/'.$resultProcessing->id, $editedResultProcessing);

        $this->assertApiResponse($editedResultProcessing);
    }

    /**
     * @test
     */
    public function testDeleteResultProcessing()
    {
        $resultProcessing = $this->makeResultProcessing();
        $this->json('DELETE', '/api/v1/resultProcessings/'.$resultProcessing->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/resultProcessings/'.$resultProcessing->id);

        $this->assertResponseStatus(404);
    }
}
