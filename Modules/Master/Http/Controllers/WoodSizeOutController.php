<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodSizeOutDataTable;
use Modules\Master\Http\Requests;
use Modules\Master\Http\Requests\CreateWoodSizeOutRequest;
use Modules\Master\Http\Requests\UpdateWoodSizeOutRequest;
use Modules\Master\Repositories\WoodSizeOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WoodSizeOutController extends AppBaseController
{
    /** @var  WoodSizeOutRepository */
    private $woodSizeOutRepository;

    public function __construct(WoodSizeOutRepository $woodSizeOutRepo)
    {
        $this->woodSizeOutRepository = $woodSizeOutRepo;
    }

    /**
     * Display a listing of the WoodSizeOut.
     *
     * @param WoodSizeOutDataTable $woodSizeOutDataTable
     * @return Response
     */
    public function index(WoodSizeOutDataTable $woodSizeOutDataTable)
    {
        return $woodSizeOutDataTable->render('master::wood_size_outs.index');
    }

    /**
     * Show the form for creating a new WoodSizeOut.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::wood_size_outs.create');
    }

    /**
     * Store a newly created WoodSizeOut in storage.
     *
     * @param CreateWoodSizeOutRequest $request
     *
     * @return Response
     */
    public function store(CreateWoodSizeOutRequest $request)
    {
        $input = $request->all();

        $wood_category_out_id = $request->wood_category_out_id;

        $woodSizeOut = $this->woodSizeOutRepository->create($input);

        Flash::success('Ukuran kayu keluar berhasil disimpan.');

        return redirect(url('master/woodCategoryOuts/'.$wood_category_out_id.'/edit'));
    }

    /**
     * Display the specified WoodSizeOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $woodSizeOut = $this->woodSizeOutRepository->find($id);

        if (empty($woodSizeOut)) {
            Flash::error('Ukuran kayu keluar tidak ditemukan');

            return redirect(route('woodSizeOuts.index'));
        }

        return view('master::wood_size_outs.show')->with('woodSizeOut', $woodSizeOut);
    }

    /**
     * Show the form for editing the specified WoodSizeOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $woodSizeOut = $this->woodSizeOutRepository->find($id);

        if (empty($woodSizeOut)) {
            Flash::error('Ukuran kayu keluar tidak ditemukan');

            return redirect(route('woodSizeOuts.index'));
        }

        return view('master::wood_size_outs.edit')->with('woodSizeOut', $woodSizeOut);
    }

    /**
     * Update the specified WoodSizeOut in storage.
     *
     * @param  int              $id
     * @param UpdateWoodSizeOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoodSizeOutRequest $request)
    {
        $woodSizeOut = $this->woodSizeOutRepository->find($id);

        if (empty($woodSizeOut)) {
            Flash::error('Ukuran kayu keluar tidak ditemukan');

            return redirect(route('woodSizeOuts.index'));
        }

        $woodSizeOut = $this->woodSizeOutRepository->update($request->all(), $id);

        Flash::success('Ukuran kayu keluar berhasil diperbarui.');

        $wood_category_out_id = $woodSizeOut->wood_category_out_id;

        return redirect(url('master/woodCategoryOuts/'.$wood_category_out_id.'/edit'));
    }

    /**
     * Remove the specified WoodSizeOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $woodSizeOut = $this->woodSizeOutRepository->find($id);

        if (empty($woodSizeOut)) {
            Flash::error('Ukuran kayu keluar tidak ditemukan');

            return redirect(route('woodSizeOuts.index'));
        }

        $wood_category_out_id = $woodSizeOut->wood_category_out_id;

        $this->woodSizeOutRepository->delete($id);

        Flash::success('Ukuran kayu berhasil dihapus.');

        return redirect(url('master/woodCategoryOuts/'.$wood_category_out_id.'/edit'));
    }
}
