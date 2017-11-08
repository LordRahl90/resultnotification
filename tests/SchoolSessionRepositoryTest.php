<?php

use App\Models\Admin\SchoolSession;
use App\Repositories\Admin\SchoolSessionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolSessionRepositoryTest extends TestCase
{
    use MakeSchoolSessionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SchoolSessionRepository
     */
    protected $schoolSessionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->schoolSessionRepo = App::make(SchoolSessionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSchoolSession()
    {
        $schoolSession = $this->fakeSchoolSessionData();
        $createdSchoolSession = $this->schoolSessionRepo->create($schoolSession);
        $createdSchoolSession = $createdSchoolSession->toArray();
        $this->assertArrayHasKey('id', $createdSchoolSession);
        $this->assertNotNull($createdSchoolSession['id'], 'Created SchoolSession must have id specified');
        $this->assertNotNull(SchoolSession::find($createdSchoolSession['id']), 'SchoolSession with given id must be in DB');
        $this->assertModelData($schoolSession, $createdSchoolSession);
    }

    /**
     * @test read
     */
    public function testReadSchoolSession()
    {
        $schoolSession = $this->makeSchoolSession();
        $dbSchoolSession = $this->schoolSessionRepo->find($schoolSession->id);
        $dbSchoolSession = $dbSchoolSession->toArray();
        $this->assertModelData($schoolSession->toArray(), $dbSchoolSession);
    }

    /**
     * @test update
     */
    public function testUpdateSchoolSession()
    {
        $schoolSession = $this->makeSchoolSession();
        $fakeSchoolSession = $this->fakeSchoolSessionData();
        $updatedSchoolSession = $this->schoolSessionRepo->update($fakeSchoolSession, $schoolSession->id);
        $this->assertModelData($fakeSchoolSession, $updatedSchoolSession->toArray());
        $dbSchoolSession = $this->schoolSessionRepo->find($schoolSession->id);
        $this->assertModelData($fakeSchoolSession, $dbSchoolSession->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSchoolSession()
    {
        $schoolSession = $this->makeSchoolSession();
        $resp = $this->schoolSessionRepo->delete($schoolSession->id);
        $this->assertTrue($resp);
        $this->assertNull(SchoolSession::find($schoolSession->id), 'SchoolSession should not exist in DB');
    }
}
