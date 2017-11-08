<?php

use App\Models\Admin\ResultDetail;
use App\Repositories\Admin\ResultDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResultDetailRepositoryTest extends TestCase
{
    use MakeResultDetailTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResultDetailRepository
     */
    protected $resultDetailRepo;

    public function setUp()
    {
        parent::setUp();
        $this->resultDetailRepo = App::make(ResultDetailRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateResultDetail()
    {
        $resultDetail = $this->fakeResultDetailData();
        $createdResultDetail = $this->resultDetailRepo->create($resultDetail);
        $createdResultDetail = $createdResultDetail->toArray();
        $this->assertArrayHasKey('id', $createdResultDetail);
        $this->assertNotNull($createdResultDetail['id'], 'Created ResultDetail must have id specified');
        $this->assertNotNull(ResultDetail::find($createdResultDetail['id']), 'ResultDetail with given id must be in DB');
        $this->assertModelData($resultDetail, $createdResultDetail);
    }

    /**
     * @test read
     */
    public function testReadResultDetail()
    {
        $resultDetail = $this->makeResultDetail();
        $dbResultDetail = $this->resultDetailRepo->find($resultDetail->id);
        $dbResultDetail = $dbResultDetail->toArray();
        $this->assertModelData($resultDetail->toArray(), $dbResultDetail);
    }

    /**
     * @test update
     */
    public function testUpdateResultDetail()
    {
        $resultDetail = $this->makeResultDetail();
        $fakeResultDetail = $this->fakeResultDetailData();
        $updatedResultDetail = $this->resultDetailRepo->update($fakeResultDetail, $resultDetail->id);
        $this->assertModelData($fakeResultDetail, $updatedResultDetail->toArray());
        $dbResultDetail = $this->resultDetailRepo->find($resultDetail->id);
        $this->assertModelData($fakeResultDetail, $dbResultDetail->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteResultDetail()
    {
        $resultDetail = $this->makeResultDetail();
        $resp = $this->resultDetailRepo->delete($resultDetail->id);
        $this->assertTrue($resp);
        $this->assertNull(ResultDetail::find($resultDetail->id), 'ResultDetail should not exist in DB');
    }
}
