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
        return $woodSizeDataTable->render('master::wood_sizes.index');
    }

    /**
     * Show the form for creating a new WoodSize.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::wood_sizes.create');
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

        $wood_category_id = $request->wood_category_id;

        $woodSize = $this->woodSizeRepository->create($input);

        Flash::success('Ukuran kayu berhasil diperbarui.');

        return redirect(url('master/woodCategories/'.$wood_category_id.'/edit'));
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
            Flash::error('Ukuran kayu tidak ditemukan');

            return redirect(route('woodSizes.index'));
        }

        return view('master::wood_sizes.show')->with('woodSize', $woodSize);
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
            Flash::error('Ukuran kayu tidak ditemukan');

            return redirect(route('woodSizes.index'));
        }

        return view('master::wood_sizes.edit')->with('woodSize', $woodSize);
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
            Flash::error('Ukuran kayu tidak ditemukan');

            return redirect(route('woodSizes.index'));
        }

        $woodSize = $this->woodSizeRepository->update($request->all(), $id);

        Flash::success('Ukuran kayu berhasil diperbarui.');

        $wood_category_id = $woodSize->wood_category_id;

        return redirect(url('master/woodCategories/'.$wood_category_id.'/edit'));

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
            Flash::error('Ukuran kayu tidak ditemukan');

            return redirect(route('woodSizes.index'));
        }

        $wood_category_id = $woodSize->wood_category_id;

        $this->woodSizeRepository->delete($id);

        Flash::success('Ukuran kayu berhasil dihapus.');

        return redirect(url('master/woodCategories/'.$wood_category_id.'/edit'));
    }
}
