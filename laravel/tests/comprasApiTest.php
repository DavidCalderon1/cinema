<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class comprasApiTest extends TestCase
{
    use MakecomprasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecompras()
    {
        $compras = $this->fakecomprasData();
        $this->json('POST', '/api/v1/compras', $compras);

        $this->assertApiResponse($compras);
    }

    /**
     * @test
     */
    public function testReadcompras()
    {
        $compras = $this->makecompras();
        $this->json('GET', '/api/v1/compras/'.$compras->id);

        $this->assertApiResponse($compras->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecompras()
    {
        $compras = $this->makecompras();
        $editedcompras = $this->fakecomprasData();

        $this->json('PUT', '/api/v1/compras/'.$compras->id, $editedcompras);

        $this->assertApiResponse($editedcompras);
    }

    /**
     * @test
     */
    public function testDeletecompras()
    {
        $compras = $this->makecompras();
        $this->json('DELETE', '/api/v1/compras/'.$compras->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/compras/'.$compras->id);

        $this->assertResponseStatus(404);
    }
}
