<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePartenaireAPIRequest;
use App\Http\Requests\API\UpdatePartenaireAPIRequest;
use App\Models\Partenaire;
use App\Repositories\PartenaireRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PartenaireController
 * @package App\Http\Controllers\API
 */

class PartenaireAPIController extends AppBaseController
{
    /** @var  PartenaireRepository */
    private $partenaireRepository;

    public function __construct(PartenaireRepository $partenaireRepo)
    {
        $this->partenaireRepository = $partenaireRepo;
    }

    /**
     * Display a listing of the Partenaire.
     * GET|HEAD /partenaires
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $partenaires = $this->partenaireRepository->all();

        return $this->sendResponse($partenaires->toArray(), 'Partenaires retrieved successfully');
    }

    /**
     * Store a newly created Partenaire in storage.
     * POST /partenaires
     *
     * @param CreatePartenaireAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePartenaireAPIRequest $request)
    {
        $input = $request->all();

        $partenaire = $this->partenaireRepository->create($input);

        return $this->sendResponse($partenaire->toArray(), 'Partenaire saved successfully');
    }

    /**
     * Display the specified Partenaire.
     * GET|HEAD /partenaires/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Partenaire $partenaire */
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            return $this->sendError('Partenaire not found');
        }

        return $this->sendResponse($partenaire->toArray(), 'Partenaire retrieved successfully');
    }

    /**
     * Update the specified Partenaire in storage.
     * PUT/PATCH /partenaires/{id}
     *
     * @param int $id
     * @param UpdatePartenaireAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartenaireAPIRequest $request)
    {
        $input = $request->all();

        /** @var Partenaire $partenaire */
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            return $this->sendError('Partenaire not found');
        }

        $partenaire = $this->partenaireRepository->update($input, $id);

        return $this->sendResponse($partenaire->toArray(), 'Partenaire updated successfully');
    }

    /**
     * Remove the specified Partenaire from storage.
     * DELETE /partenaires/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Partenaire $partenaire */
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            return $this->sendError('Partenaire not found');
        }

        $partenaire->delete();

        return $this->sendSuccess('Partenaire deleted successfully');
    }
}
