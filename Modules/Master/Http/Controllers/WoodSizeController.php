<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodSizeDataTable;
use Modules\Master\Http\Requests\CreateWoodSizeRequest;
use Modules\Master\Http\Requests\UpdateWoodSizeRequest;
use Modules\Master\Repositories\WoodSizeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WoodSizeController extends AppBaseController
{
    /** @var  WoodSizeRepository */
    private $woodSizeRepository;

    public function __construct(WoodSizeRepository $woodSizeRepo)
    {
        $this->woodSizeRepository = $woodSizeRepo;
    }

    /**
     * Display a listing of the WoodSize.
     *
     * @param WoodSizeDataTable $woodSizeDataTable
     * @return Response
     */
    public function index(WoodSizeDataTable $woodSizeDataTable)
    {
        return $woodSizeDataTable->render('wood_sizes.index');
    }

    /**
     * Show the form for creating a new WoodSize.
     *
     * @return Response
     */
    public function create()
    {
        return view('wood_sizes.create');
    }

    /**
     * Store a newly created WoodSize in storage.
     *
     * @param CreateWoodSizeRequest $request
     *
     * @return Response
     */
    public function store(CreateWoodSizeRequest $request)
    {
        $input = $request->all();

        $woodSize = $this->woodSizeRepository->create($input);

        Flash::success('Wood Size saved successfully.');

        return redirect(route('woodSizes.index'));
    }

    /**
     * Display the specified WoodSize.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $woodSize = $this->woodSizeRepository->find($id);

        if (empty($woodSize)) {
            Flash::error('Wood Size not found');

            return redirect(route('woodSizes.index'));
        }

        return view('wood_sizes.show')->with('woodSize', $woodSize);
    }

    /**
     * Show the form for editing the specified WoodSize.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $woodSize = $this->woodSizeRepository->find($id);

        if (empty($woodSize)) {
            Flash::error('Wood Size not found');

            return redirect(route('woodSizes.index'));
        }

        return view('wood_sizes.edit')->with('woodSize', $woodSize);
    }

    /**
     * Update the specified WoodSize in storage.
     *
     * @param  int              $id
     * @param UpdateWoodSizeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoodSizeRequest $request)
    {
        $woodSize = $this->woodSizeRepository->find($id);

        if (empty($woodSize)) {
            Flash::error('Wood Size not found');

            return redirect(route('woodSizes.index'));
        }

        $woodSize = $this->woodSizeRepository->update($request->all(), $id);

        Flash::success('Wood Size updated successfully.');

        return redirect(route('woodSizes.index'));
    }

    /**
     * Remove the specified WoodSize from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $woodSize = $this->woodSizeRepository->find($id);

        if (empty($woodSize)) {
            Flash::error('Wood Size not found');

            return redirect(route('woodSizes.index'));
        }

        $this->woodSizeRepository->delete($id);

        Flash::success('Wood Size deleted successfully.');

        return redirect(route('woodSizes.index'));
    }
}
