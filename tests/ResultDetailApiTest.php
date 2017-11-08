<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResultDetailApiTest extends TestCase
{
    use MakeResultDetailTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateResultDetail()
    {
        $resultDetail = $this->fakeResultDetailData();
        $this->json('POST', '/api/v1/resultDetails', $resultDetail);

        $this->assertApiResponse($resultDetail);
    }

    /**
     * @test
     */
    public function testReadResultDetail()
    {
        $resultDetail = $this->makeResultDetail();
        $this->json('GET', '/api/v1/resultDetails/'.$resultDetail->id);

        $this->assertApiResponse($resultDetail->toArray());
    }

    /**
     * @test
     */
    public function testUpdateResultDetail()
    {
        $resultDetail = $this->makeResultDetail();
        $editedResultDetail = $this->fakeResultDetailData();

        $this->json('PUT', '/api/v1/resultDetails/'.$resultDetail->id, $editedResultDetail);

        $this->assertApiResponse($editedResultDetail);
    }

    /**
     * @test
     */
    public function testDeleteResultDetail()
    {
        $resultDetail = $this->makeResultDetail();
        $this->json('DELETE', '/api/v1/resultDetails/'.$resultDetail->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/resultDetails/'.$resultDetail->id);

        $this->assertResponseStatus(404);
    }
}
