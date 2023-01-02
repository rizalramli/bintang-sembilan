<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodCategoryDataTable;
use Modules\Master\Http\Requests\CreateWoodCategoryRequest;
use Modules\Master\Http\Requests\UpdateWoodCategoryRequest;
use Modules\Master\Repositories\WoodCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\DataTables\WoodSizeDataTable;
use Modules\Master\Models\WoodSize;
use Response;

class WoodCategoryController extends AppBaseController
{
    /** @var  WoodCategoryRepository */
    private $woodCategoryRepository;

    public function __construct(WoodCategoryRepository $woodCategoryRepo)
    {
        $this->woodCategoryRepository = $woodCategoryRepo;
    }

    /**
     * Display a listing of the WoodCategory.
     *
     * @param WoodCategoryDataTable $woodCategoryDataTable
     * @return Response
     */
    public function index(WoodCategoryDataTable $woodCategoryDataTable)
    {
        return $woodCategoryDataTable->render('master::wood_categories.index');
    }

    /**
     * Show the form for creating a new WoodCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::wood_categories.create');
    }

    /**
     * Store a newly created WoodCategory in storage.
     *
     * @param CreateWoodCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateWoodCategoryRequest $request)
    {
        $input = $request->all();

        $template_wood_id = $request->template_wood_id;

        $woodCategory = $this->woodCategoryRepository->create($input);

        Flash::success('Kategori kayu berhasil disimpan.');

        return redirect(url('master/templateWoods/'.$template_wood_id.'/edit'));
    }

    /**
     * Display the specified WoodCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $woodCategory = $this->woodCategoryRepository->find($id);

        if (empty($woodCategory)) {
            Flash::error('Kategori Kayu tidak ditemukan.');

            return redirect(route('woodCategories.index'));
        }

        return view('master::wood_categories.show')->with('woodCategory', $woodCategory);
    }

    /**
     * Show the form for editing the specified WoodCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,WoodSizeDataTable $woodSizeDataTable)
    {
        $woodCategory = $this->woodCategoryRepository->find($id);

        if (empty($woodCategory)) {
            Flash::error('Kategori Kayu tidak ditemukan.');

            return redirect(route('woodCategories.index'));
        }

        return $woodSizeDataTable
        ->with('id',$id)
        ->render('master::wood_categories.edit',compact('woodCategory'));
    }

    /**
     * Update the specified WoodCategory in storage.
     *
     * @param  int              $id
     * @param UpdateWoodCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWoodCategoryRequest $request)
    {
        $woodCategory = $this->woodCategoryRepository->find($id);

        if (empty($woodCategory)) {
            Flash::error('Kategori Kayu tidak ditemukan.');

            return redirect(route('woodCategories.index'));
        }

        $woodCategory = $this->woodCategoryRepository->update($request->all(), $id);

        Flash::success('Kategori kayu berhasil diperbarui.');

        $template_wood_id = $woodCategory->template_wood_id;

        return redirect(url('master/templateWoods/'.$template_wood_id.'/edit'));
    }

    /**
     * Remove the specified WoodCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $woodCategory = $this->woodCategoryRepository->find($id);

        if (empty($woodCategory)) {
            Flash::error('Kategori Kayu tidak ditemukan.');

            return redirect(route('woodCategories.index'));
        }

        // delete wood size

        $template_wood_id = $woodCategory->template_wood_id;

        $wood_size = WoodSize::where('wood_category_id',$id);

        $this->woodCategoryRepository->delete($id);

        Flash::success('Kategori kayu berhasil dihapus.');

        return redirect(url('master/templateWoods/'.$template_wood_id.'/edit'));
    }
}
