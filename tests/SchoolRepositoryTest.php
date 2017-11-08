<?php

use App\Models\Admin\School;
use App\Repositories\Admin\SchoolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolRepositoryTest extends TestCase
{
    use MakeSchoolTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SchoolRepository
     */
    protected $schoolRepo;

    public function setUp()
    {
        parent::setUp();
        $this->schoolRepo = App::make(SchoolRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSchool()
    {
        $school = $this->fakeSchoolData();
        $createdSchool = $this->schoolRepo->create($school);
        $createdSchool = $createdSchool->toArray();
        $this->assertArrayHasKey('id', $createdSchool);
        $this->assertNotNull($createdSchool['id'], 'Created School must have id specified');
        $this->assertNotNull(School::find($createdSchool['id']), 'School with given id must be in DB');
        $this->assertModelData($school, $createdSchool);
    }

    /**
     * @test read
     */
    public function testReadSchool()
    {
        $school = $this->makeSchool();
        $dbSchool = $this->schoolRepo->find($school->id);
        $dbSchool = $dbSchool->toArray();
        $this->assertModelData($school->toArray(), $dbSchool);
    }

    /**
     * @test update
     */
    public function testUpdateSchool()
    {
        $school = $this->makeSchool();
        $fakeSchool = $this->fakeSchoolData();
        $updatedSchool = $this->schoolRepo->update($fakeSchool, $school->id);
        $this->assertModelData($fakeSchool, $updatedSchool->toArray());
        $dbSchool = $this->schoolRepo->find($school->id);
        $this->assertModelData($fakeSchool, $dbSchool->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSchool()
    {
        $school = $this->makeSchool();
        $resp = $this->schoolRepo->delete($school->id);
        $this->assertTrue($resp);
        $this->assertNull(School::find($school->id), 'School should not exist in DB');
    }
}
