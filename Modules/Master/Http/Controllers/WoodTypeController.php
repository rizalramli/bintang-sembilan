<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodTypeDataTable;
use Modules\Master\Http\Requests\CreateWoodTypeRequest;
use Modules\Master\Http\Requests\UpdateWoodTypeRequest;
use Modules\Master\Repositories\WoodTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WoodTypeController extends AppBaseController
{
    /** @var  WoodTypeRepository */
    private $woodTypeRepository;

    public function __construct(WoodTypeRepository $woodTypeRepo)
    {
        $this->woodTypeRepository = $woodTypeRepo;
    }

    /**
     * Display a listing of the WoodType.
     *
     * @param WoodTypeDataTable $woodTypeDataTable
     * @return Response
     */
    public function index(WoodTypeDataTable $woodTypeDataTable)
    {
        return $woodTypeDataTable->render('master::wood_types.index');
    }

    /**
     * Show the form for creating a new WoodType.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::wood_types.create');
    }

    /**
     * Store a newly created WoodType in storage.
     *
     * @param CreateWoodTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateWoodTypeRequest $request)
    {
        $input = $request->all();

        $woodType = $this->woodTypeRepository->create($input);

        Flash::success('Jenis kayu berhasil disimpan.');

        return redirect(route('woodTypes.index'));
    }

    /**
     * Display the specified WoodType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $woodType = $this->woodTypeRepository->find($id);

        if (empty($woodType)) {
            Flash::error('Jenis kayu tidak ditemukan.');

            return redirect(route('woodTypes.index'));
        }

        return view('master::wood_types.show')->with('woodType', $woodType);
    }

    /**
     * Show the form for editing the specified WoodType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $woodType = $this->woodTypeRepository->find($id);

        if (empty($woodType)) {
            Flash::error('Jenis kayu tidak ditemukan.');

            return redirect(route('woodTypes.index'));
        }

        return view('master::wood_types.edit')->with('woodType', $woodType);
    }

    /**
     * Update the specified WoodType in storage.
     *
     * @param  int              $id
     * @param UpdateWoodTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoodTypeRequest $request)
    {
        $woodType = $this->woodTypeRepository->find($id);

        if (empty($woodType)) {
            Flash::error('Jenis kayu tidak ditemukan.');

            return redirect(route('woodTypes.index'));
        }

        $woodType = $this->woodTypeRepository->update($request->all(), $id);

        Flash::success('Jenis kayu berhasil diperbarui.');

        return redirect(route('woodTypes.index'));
    }

    /**
     * Remove the specified WoodType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $woodType = $this->woodTypeRepository->find($id);

        if (empty($woodType)) {
            Flash::error('Jenis kayu tidak ditemukan.');

            return redirect(route('woodTypes.index'));
        }

        $this->woodTypeRepository->delete($id);

        Flash::success('Jenis kayu berhasil dihapus.');

        return redirect(route('woodTypes.index'));
    }
}
