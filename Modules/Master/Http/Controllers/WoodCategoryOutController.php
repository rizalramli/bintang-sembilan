<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodCategoryOutDataTable;
use Modules\Master\Http\Requests;
use Modules\Master\Http\Requests\CreateWoodCategoryOutRequest;
use Modules\Master\Http\Requests\UpdateWoodCategoryOutRequest;
use Modules\Master\Repositories\WoodCategoryOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\DataTables\WoodSizeOutDataTable;
use Modules\Master\Models\Product;
use Modules\Master\Models\WoodSizeOut;
use Modules\Master\Models\WoodType;
use Response;

class WoodCategoryOutController extends AppBaseController
{
    /** @var  WoodCategoryOutRepository */
    private $woodCategoryOutRepository;

    public function __construct(WoodCategoryOutRepository $woodCategoryOutRepo)
    {
        $this->woodCategoryOutRepository = $woodCategoryOutRepo;
    }

    /**
     * Display a listing of the WoodCategoryOut.
     *
     * @param WoodCategoryOutDataTable $woodCategoryOutDataTable
     * @return Response
     */
    public function index(WoodCategoryOutDataTable $woodCategoryOutDataTable)
    {
        return $woodCategoryOutDataTable->render('master::wood_category_outs.index');
    }

    /**
     * Show the form for creating a new WoodCategoryOut.
     *
     * @return Response
     */
    public function create()
    {
        $product = Product::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');
        return view('master::wood_category_outs.create', compact('product', 'wood_type'));
    }

    /**
     * Store a newly created WoodCategoryOut in storage.
     *
     * @param CreateWoodCategoryOutRequest $request
     *
     * @return Response
     */
    public function store(CreateWoodCategoryOutRequest $request)
    {
        $input = $request->all();

        $woodCategoryOut = $this->woodCategoryOutRepository->create($input);

        $template_wood_out_id = $request->template_wood_out_id;

        Flash::success('Kategori kayu keluar berhasil disimpan.');

        return redirect(url('master/templateWoodOuts/'.$template_wood_out_id.'/edit'));
    }

    /**
     * Display the specified WoodCategoryOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $woodCategoryOut = $this->woodCategoryOutRepository->find($id);

        if (empty($woodCategoryOut)) {
            Flash::error('Kategori kayu keluar tidak ditemukan');

            return redirect(route('woodCategoryOuts.index'));
        }

        return view('master::wood_category_outs.show')->with('woodCategoryOut', $woodCategoryOut);
    }

    /**
     * Show the form for editing the specified WoodCategoryOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,WoodSizeOutDataTable $woodSizeOutDataTable)
    {
        $woodCategoryOut = $this->woodCategoryOutRepository->find($id);

        if (empty($woodCategoryOut)) {
            Flash::error('Kategori kayu keluar tidak ditemukan');

            return redirect(route('woodCategoryOuts.index'));
        }

        $product = Product::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        return $woodSizeOutDataTable
        ->with('id',$id)
        ->render('master::wood_category_outs.edit',compact('product','wood_type','woodCategoryOut'));
    }

    /**
     * Update the specified WoodCategoryOut in storage.
     *
     * @param  int              $id
     * @param UpdateWoodCategoryOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoodCategoryOutRequest $request)
    {
        $woodCategoryOut = $this->woodCategoryOutRepository->find($id);

        if (empty($woodCategoryOut)) {
            Flash::error('Kategori kayu keluar tidak ditemukan');

            return redirect(route('woodCategoryOuts.index'));
        }

        $woodCategoryOut = $this->woodCategoryOutRepository->update($request->all(), $id);

        Flash::success('Kategori kayu keluar berhasil diperbarui.');

        $template_wood_out_id = $woodCategoryOut->template_wood_out_id;

        return redirect(url('master/templateWoodOuts/'.$template_wood_out_id.'/edit'));
    }

    /**
     * Remove the specified WoodCategoryOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $woodCategoryOut = $this->woodCategoryOutRepository->find($id);

        if (empty($woodCategoryOut)) {
            Flash::error('Kategori kayu keluar tidak ditemukan');

            return redirect(route('woodCategoryOuts.index'));
        }

        $template_wood_out_id = $woodCategoryOut->template_wood_out_id;

        $wood_size = WoodSizeOut::where('wood_category_out_id',$id)->delete();

        $this->woodCategoryOutRepository->delete($id);

        Flash::success('Kategori kayu keluar berhasil dihapus.');

        return redirect(url('master/templateWoodOuts/'.$template_wood_out_id.'/edit'));
    }
}
