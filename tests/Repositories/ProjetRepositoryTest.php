<?php namespace Tests\Repositories;

use App\Models\Projet;
use App\Repositories\ProjetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProjetRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjetRepository
     */
    protected $projetRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->projetRepo = \App::make(ProjetRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_projet()
    {
        $projet = Projet::factory()->make()->toArray();

        $createdProjet = $this->projetRepo->create($projet);

        $createdProjet = $createdProjet->toArray();
        $this->assertArrayHasKey('id', $createdProjet);
        $this->assertNotNull($createdProjet['id'], 'Created Projet must have id specified');
        $this->assertNotNull(Projet::find($createdProjet['id']), 'Projet with given id must be in DB');
        $this->assertModelData($projet, $createdProjet);
    }

    /**
     * @test read
     */
    public function test_read_projet()
    {
        $projet = Projet::factory()->create();

        $dbProjet = $this->projetRepo->find($projet->id);

        $dbProjet = $dbProjet->toArray();
        $this->assertModelData($projet->toArray(), $dbProjet);
    }

    /**
     * @test update
     */
    public function test_update_projet()
    {
        $projet = Projet::factory()->create();
        $fakeProjet = Projet::factory()->make()->toArray();

        $updatedProjet = $this->projetRepo->update($fakeProjet, $projet->id);

        $this->assertModelData($fakeProjet, $updatedProjet->toArray());
        $dbProjet = $this->projetRepo->find($projet->id);
        $this->assertModelData($fakeProjet, $dbProjet->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_projet()
    {
        $projet = Projet::factory()->create();

        $resp = $this->projetRepo->delete($projet->id);

        $this->assertTrue($resp);
        $this->assertNull(Projet::find($projet->id), 'Projet should not exist in DB');
    }
}
