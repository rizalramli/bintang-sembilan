<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WoodCategoryDataTable;
use Modules\Master\Http\Requests\CreateWoodCategoryRequest;
use Modules\Master\Http\Requests\UpdateWoodCategoryRequest;
use Modules\Master\Repositories\WoodCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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
        return $woodCategoryDataTable->render('wood_categories.index');
    }

    /**
     * Show the form for creating a new WoodCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('wood_categories.create');
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

        $woodCategory = $this->woodCategoryRepository->create($input);

        Flash::success('Wood Category saved successfully.');

        return redirect(route('woodCategories.index'));
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
            Flash::error('Wood Category not found');

            return redirect(route('woodCategories.index'));
        }

        return view('wood_categories.show')->with('woodCategory', $woodCategory);
    }

    /**
     * Show the form for editing the specified WoodCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $woodCategory = $this->woodCategoryRepository->find($id);

        if (empty($woodCategory)) {
            Flash::error('Wood Category not found');

            return redirect(route('woodCategories.index'));
        }

        return view('wood_categories.edit')->with('woodCategory', $woodCategory);
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
            Flash::error('Wood Category not found');

            return redirect(route('woodCategories.index'));
        }

        $woodCategory = $this->woodCategoryRepository->update($request->all(), $id);

        Flash::success('Wood Category updated successfully.');

        return redirect(route('woodCategories.index'));
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
            Flash::error('Wood Category not found');

            return redirect(route('woodCategories.index'));
        }

        $this->woodCategoryRepository->delete($id);

        Flash::success('Wood Category deleted successfully.');

        return redirect(route('woodCategories.index'));
    }
}
