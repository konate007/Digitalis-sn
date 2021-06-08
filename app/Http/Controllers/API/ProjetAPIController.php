<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjetAPIRequest;
use App\Http\Requests\API\UpdateProjetAPIRequest;
use App\Models\Projet;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProjetController
 * @package App\Http\Controllers\API
 */

class ProjetAPIController extends AppBaseController
{
    /** @var  ProjetRepository */
    private $projetRepository;

    public function __construct(ProjetRepository $projetRepo)
    {
        $this->projetRepository = $projetRepo;
    }

    /**
     * Display a listing of the Projet.
     * GET|HEAD /projets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $projets = $this->projetRepository->all();

        return $this->sendResponse($projets->toArray(), 'Projets retrieved successfully');
    }

    /**
     * Store a newly created Projet in storage.
     * POST /projets
     *
     * @param CreateProjetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProjetAPIRequest $request)
    {
        $input = $request->all();

        $projet = $this->projetRepository->create($input);

        return $this->sendResponse($projet->toArray(), 'Projet saved successfully');
    }

    /**
     * Display the specified Projet.
     * GET|HEAD /projets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Projet $projet */
        $projet = $this->projetRepository->find($id);

        if (empty($projet)) {
            return $this->sendError('Projet not found');
        }

        return $this->sendResponse($projet->toArray(), 'Projet retrieved successfully');
    }

    /**
     * Update the specified Projet in storage.
     * PUT/PATCH /projets/{id}
     *
     * @param int $id
     * @param UpdateProjetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjetAPIRequest $request)
    {
        $input = $request->all();

        /** @var Projet $projet */
        $projet = $this->projetRepository->find($id);

        if (empty($projet)) {
            return $this->sendError('Projet not found');
        }

        $projet = $this->projetRepository->update($input, $id);

        return $this->sendResponse($projet->toArray(), 'Projet updated successfully');
    }

    /**
     * Remove the specified Projet from storage.
     * DELETE /projets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Projet $projet */
        $projet = $this->projetRepository->find($id);

        if (empty($projet)) {
            return $this->sendError('Projet not found');
        }

        $projet->delete();

        return $this->sendSuccess('Projet deleted successfully');
    }
}
