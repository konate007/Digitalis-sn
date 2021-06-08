<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartenaireRequest;
use App\Http\Requests\UpdatePartenaireRequest;
use App\Repositories\PartenaireRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PartenaireController extends AppBaseController
{
    /** @var  PartenaireRepository */
    private $partenaireRepository;

    public function __construct(PartenaireRepository $partenaireRepo)
    {
        $this->partenaireRepository = $partenaireRepo;
    }

    /**
     * Display a listing of the Partenaire.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $partenaires = $this->partenaireRepository->all();

        return view('partenaires.index')
            ->with('partenaires', $partenaires);
    }

    /**
     * Show the form for creating a new Partenaire.
     *
     * @return Response
     */
    public function create()
    {
        return view('partenaires.create');
    }

    /**
     * Store a newly created Partenaire in storage.
     *
     * @param CreatePartenaireRequest $request
     *
     * @return Response
     */
    public function store(CreatePartenaireRequest $request)
    {
        $input = $request->all();

        $partenaire = $this->partenaireRepository->create($input);

        Flash::success('Partenaire saved successfully.');

        return redirect(route('partenaires.index'));
    }

    /**
     * Display the specified Partenaire.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            Flash::error('Partenaire not found');

            return redirect(route('partenaires.index'));
        }

        return view('partenaires.show')->with('partenaire', $partenaire);
    }

    /**
     * Show the form for editing the specified Partenaire.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            Flash::error('Partenaire not found');

            return redirect(route('partenaires.index'));
        }

        return view('partenaires.edit')->with('partenaire', $partenaire);
    }

    /**
     * Update the specified Partenaire in storage.
     *
     * @param int $id
     * @param UpdatePartenaireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartenaireRequest $request)
    {
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            Flash::error('Partenaire not found');

            return redirect(route('partenaires.index'));
        }

        $partenaire = $this->partenaireRepository->update($request->all(), $id);

        Flash::success('Partenaire updated successfully.');

        return redirect(route('partenaires.index'));
    }

    /**
     * Remove the specified Partenaire from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partenaire = $this->partenaireRepository->find($id);

        if (empty($partenaire)) {
            Flash::error('Partenaire not found');

            return redirect(route('partenaires.index'));
        }

        $this->partenaireRepository->delete($id);

        Flash::success('Partenaire deleted successfully.');

        return redirect(route('partenaires.index'));
    }
}
