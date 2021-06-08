<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Projet;

class ProjetApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_projet()
    {
        $projet = Projet::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/projets', $projet
        );

        $this->assertApiResponse($projet);
    }

    /**
     * @test
     */
    public function test_read_projet()
    {
        $projet = Projet::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/projets/'.$projet->id
        );

        $this->assertApiResponse($projet->toArray());
    }

    /**
     * @test
     */
    public function test_update_projet()
    {
        $projet = Projet::factory()->create();
        $editedProjet = Projet::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/projets/'.$projet->id,
            $editedProjet
        );

        $this->assertApiResponse($editedProjet);
    }

    /**
     * @test
     */
    public function test_delete_projet()
    {
        $projet = Projet::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/projets/'.$projet->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/projets/'.$projet->id
        );

        $this->response->assertStatus(404);
    }
}
