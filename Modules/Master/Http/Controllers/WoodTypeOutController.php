<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodTypeOutDataTable;
use Modules\Master\Http\Requests\CreateWoodTypeOutRequest;
use Modules\Master\Http\Requests\UpdateWoodTypeOutRequest;
use Modules\Master\Repositories\WoodTypeOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WoodTypeOutController extends AppBaseController
{
    /** @var  WoodTypeOutRepository */
    private $woodTypeOutRepository;

    public function __construct(WoodTypeOutRepository $woodTypeOutRepo)
    {
        $this->woodTypeOutRepository = $woodTypeOutRepo;
    }

    /**
     * Display a listing of the WoodTypeOut.
     *
     * @param WoodTypeOutDataTable $woodTypeOutDataTable
     * @return Response
     */
    public function index(WoodTypeOutDataTable $woodTypeOutDataTable)
    {
        return $woodTypeOutDataTable->render('master::wood_type_outs.index');
    }

    /**
     * Show the form for creating a new WoodTypeOut.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::wood_type_outs.create');
    }

    /**
     * Store a newly created WoodTypeOut in storage.
     *
     * @param CreateWoodTypeOutRequest $request
     *
     * @return Response
     */
    public function store(CreateWoodTypeOutRequest $request)
    {
        $input = $request->all();

        $woodTypeOut = $this->woodTypeOutRepository->create($input);

        Flash::success('Jenis Kayu Keluar berhasil disimpan.');

        return redirect(route('woodTypeOuts.index'));
    }

    /**
     * Display the specified WoodTypeOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $woodTypeOut = $this->woodTypeOutRepository->find($id);

        if (empty($woodTypeOut)) {
            Flash::error('Jenis Kayu Keluar tidak ditemukan.');

            return redirect(route('woodTypeOuts.index'));
        }

        return view('master::wood_type_outs.show')->with('woodTypeOut', $woodTypeOut);
    }

    /**
     * Show the form for editing the specified WoodTypeOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $woodTypeOut = $this->woodTypeOutRepository->find($id);

        if (empty($woodTypeOut)) {
            Flash::error('Jenis Kayu Keluar tidak ditemukan.');

            return redirect(route('woodTypeOuts.index'));
        }

        return view('master::wood_type_outs.edit')->with('woodTypeOut', $woodTypeOut);
    }

    /**
     * Update the specified WoodTypeOut in storage.
     *
     * @param  int              $id
     * @param UpdateWoodTypeOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoodTypeOutRequest $request)
    {
        $woodTypeOut = $this->woodTypeOutRepository->find($id);

        if (empty($woodTypeOut)) {
            Flash::error('Jenis Kayu Keluar tidak ditemukan.');

            return redirect(route('woodTypeOuts.index'));
        }

        $woodTypeOut = $this->woodTypeOutRepository->update($request->all(), $id);

        Flash::success('Jenis Kayu Keluar berhasil diperbarui.');

        return redirect(route('woodTypeOuts.index'));
    }

    /**
     * Remove the specified WoodTypeOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $woodTypeOut = $this->woodTypeOutRepository->find($id);

        if (empty($woodTypeOut)) {
            Flash::error('Jenis Kayu Keluar tidak ditemukan.');

            return redirect(route('woodTypeOuts.index'));
        }

        $this->woodTypeOutRepository->delete($id);

        Flash::success('Jenis Kayu Keluar berhasil dihapus.');

        return redirect(route('woodTypeOuts.index'));
    }
}
