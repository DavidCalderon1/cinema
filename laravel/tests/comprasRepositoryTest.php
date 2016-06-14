<?php

use App\Models\compras;
use App\Repositories\comprasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class comprasRepositoryTest extends TestCase
{
    use MakecomprasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var comprasRepository
     */
    protected $comprasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comprasRepo = App::make(comprasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecompras()
    {
        $compras = $this->fakecomprasData();
        $createdcompras = $this->comprasRepo->create($compras);
        $createdcompras = $createdcompras->toArray();
        $this->assertArrayHasKey('id', $createdcompras);
        $this->assertNotNull($createdcompras['id'], 'Created compras must have id specified');
        $this->assertNotNull(compras::find($createdcompras['id']), 'compras with given id must be in DB');
        $this->assertModelData($compras, $createdcompras);
    }

    /**
     * @test read
     */
    public function testReadcompras()
    {
        $compras = $this->makecompras();
        $dbcompras = $this->comprasRepo->find($compras->id);
        $dbcompras = $dbcompras->toArray();
        $this->assertModelData($compras->toArray(), $dbcompras);
    }

    /**
     * @test update
     */
    public function testUpdatecompras()
    {
        $compras = $this->makecompras();
        $fakecompras = $this->fakecomprasData();
        $updatedcompras = $this->comprasRepo->update($fakecompras, $compras->id);
        $this->assertModelData($fakecompras, $updatedcompras->toArray());
        $dbcompras = $this->comprasRepo->find($compras->id);
        $this->assertModelData($fakecompras, $dbcompras->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecompras()
    {
        $compras = $this->makecompras();
        $resp = $this->comprasRepo->delete($compras->id);
        $this->assertTrue($resp);
        $this->assertNull(compras::find($compras->id), 'compras should not exist in DB');
    }
}
