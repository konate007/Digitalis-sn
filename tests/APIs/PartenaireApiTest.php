<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Partenaire;

class PartenaireApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_partenaire()
    {
        $partenaire = Partenaire::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/partenaires', $partenaire
        );

        $this->assertApiResponse($partenaire);
    }

    /**
     * @test
     */
    public function test_read_partenaire()
    {
        $partenaire = Partenaire::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/partenaires/'.$partenaire->id
        );

        $this->assertApiResponse($partenaire->toArray());
    }

    /**
     * @test
     */
    public function test_update_partenaire()
    {
        $partenaire = Partenaire::factory()->create();
        $editedPartenaire = Partenaire::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/partenaires/'.$partenaire->id,
            $editedPartenaire
        );

        $this->assertApiResponse($editedPartenaire);
    }

    /**
     * @test
     */
    public function test_delete_partenaire()
    {
        $partenaire = Partenaire::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/partenaires/'.$partenaire->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/partenaires/'.$partenaire->id
        );

        $this->response->assertStatus(404);
    }
}
