<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFormationAPIRequest;
use App\Http\Requests\API\UpdateFormationAPIRequest;
use App\Models\Formation;
use App\Repositories\FormationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FormationController
 * @package App\Http\Controllers\API
 */

class FormationAPIController extends AppBaseController
{
    /** @var  FormationRepository */
    private $formationRepository;

    public function __construct(FormationRepository $formationRepo)
    {
        $this->formationRepository = $formationRepo;
    }

    /**
     * Display a listing of the Formation.
     * GET|HEAD /formations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $formations = $this->formationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($formations->toArray(), 'Formations retrieved successfully');
    }

    /**
     * Store a newly created Formation in storage.
     * POST /formations
     *
     * @param CreateFormationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFormationAPIRequest $request)
    {
        $input = $request->all();

        $formation = $this->formationRepository->create($input);

        return $this->sendResponse($formation->toArray(), 'Formation saved successfully');
    }

    /**
     * Display the specified Formation.
     * GET|HEAD /formations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Formation $formation */
        $formation = $this->formationRepository->find($id);

        if (empty($formation)) {
            return $this->sendError('Formation not found');
        }

        return $this->sendResponse($formation->toArray(), 'Formation retrieved successfully');
    }

    /**
     * Update the specified Formation in storage.
     * PUT/PATCH /formations/{id}
     *
     * @param int $id
     * @param UpdateFormationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Formation $formation */
        $formation = $this->formationRepository->find($id);

        if (empty($formation)) {
            return $this->sendError('Formation not found');
        }

        $formation = $this->formationRepository->update($input, $id);

        return $this->sendResponse($formation->toArray(), 'Formation updated successfully');
    }

    /**
     * Remove the specified Formation from storage.
     * DELETE /formations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Formation $formation */
        $formation = $this->formationRepository->find($id);

        if (empty($formation)) {
            return $this->sendError('Formation not found');
        }

        $formation->delete();

        return $this->sendSuccess('Formation deleted successfully');
    }
}
