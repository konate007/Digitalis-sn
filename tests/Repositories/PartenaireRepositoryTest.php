<?php namespace Tests\Repositories;

use App\Models\Partenaire;
use App\Repositories\PartenaireRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PartenaireRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PartenaireRepository
     */
    protected $partenaireRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->partenaireRepo = \App::make(PartenaireRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_partenaire()
    {
        $partenaire = Partenaire::factory()->make()->toArray();

        $createdPartenaire = $this->partenaireRepo->create($partenaire);

        $createdPartenaire = $createdPartenaire->toArray();
        $this->assertArrayHasKey('id', $createdPartenaire);
        $this->assertNotNull($createdPartenaire['id'], 'Created Partenaire must have id specified');
        $this->assertNotNull(Partenaire::find($createdPartenaire['id']), 'Partenaire with given id must be in DB');
        $this->assertModelData($partenaire, $createdPartenaire);
    }

    /**
     * @test read
     */
    public function test_read_partenaire()
    {
        $partenaire = Partenaire::factory()->create();

        $dbPartenaire = $this->partenaireRepo->find($partenaire->id);

        $dbPartenaire = $dbPartenaire->toArray();
        $this->assertModelData($partenaire->toArray(), $dbPartenaire);
    }

    /**
     * @test update
     */
    public function test_update_partenaire()
    {
        $partenaire = Partenaire::factory()->create();
        $fakePartenaire = Partenaire::factory()->make()->toArray();

        $updatedPartenaire = $this->partenaireRepo->update($fakePartenaire, $partenaire->id);

        $this->assertModelData($fakePartenaire, $updatedPartenaire->toArray());
        $dbPartenaire = $this->partenaireRepo->find($partenaire->id);
        $this->assertModelData($fakePartenaire, $dbPartenaire->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_partenaire()
    {
        $partenaire = Partenaire::factory()->create();

        $resp = $this->partenaireRepo->delete($partenaire->id);

        $this->assertTrue($resp);
        $this->assertNull(Partenaire::find($partenaire->id), 'Partenaire should not exist in DB');
    }
}
