<?php

use App\Models\Admin\ResultProcessing;
use App\Repositories\Admin\ResultProcessingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResultProcessingRepositoryTest extends TestCase
{
    use MakeResultProcessingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResultProcessingRepository
     */
    protected $resultProcessingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->resultProcessingRepo = App::make(ResultProcessingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateResultProcessing()
    {
        $resultProcessing = $this->fakeResultProcessingData();
        $createdResultProcessing = $this->resultProcessingRepo->create($resultProcessing);
        $createdResultProcessing = $createdResultProcessing->toArray();
        $this->assertArrayHasKey('id', $createdResultProcessing);
        $this->assertNotNull($createdResultProcessing['id'], 'Created ResultProcessing must have id specified');
        $this->assertNotNull(ResultProcessing::find($createdResultProcessing['id']), 'ResultProcessing with given id must be in DB');
        $this->assertModelData($resultProcessing, $createdResultProcessing);
    }

    /**
     * @test read
     */
    public function testReadResultProcessing()
    {
        $resultProcessing = $this->makeResultProcessing();
        $dbResultProcessing = $this->resultProcessingRepo->find($resultProcessing->id);
        $dbResultProcessing = $dbResultProcessing->toArray();
        $this->assertModelData($resultProcessing->toArray(), $dbResultProcessing);
    }

    /**
     * @test update
     */
    public function testUpdateResultProcessing()
    {
        $resultProcessing = $this->makeResultProcessing();
        $fakeResultProcessing = $this->fakeResultProcessingData();
        $updatedResultProcessing = $this->resultProcessingRepo->update($fakeResultProcessing, $resultProcessing->id);
        $this->assertModelData($fakeResultProcessing, $updatedResultProcessing->toArray());
        $dbResultProcessing = $this->resultProcessingRepo->find($resultProcessing->id);
        $this->assertModelData($fakeResultProcessing, $dbResultProcessing->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteResultProcessing()
    {
        $resultProcessing = $this->makeResultProcessing();
        $resp = $this->resultProcessingRepo->delete($resultProcessing->id);
        $this->assertTrue($resp);
        $this->assertNull(ResultProcessing::find($resultProcessing->id), 'ResultProcessing should not exist in DB');
    }
}
