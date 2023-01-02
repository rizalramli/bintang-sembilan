<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\TemplateWoodDataTable;
use Modules\Master\Http\Requests\CreateTemplateWoodRequest;
use Modules\Master\Http\Requests\UpdateTemplateWoodRequest;
use Modules\Master\Repositories\TemplateWoodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\DataTables\WoodCategoryDataTable;
use Modules\Master\Models\WoodCategory;
use Modules\Master\Models\WoodSize;
use Response;

class TemplateWoodController extends AppBaseController
{
    /** @var  TemplateWoodRepository */
    private $templateWoodRepository;

    public function __construct(TemplateWoodRepository $templateWoodRepo)
    {
        $this->templateWoodRepository = $templateWoodRepo;
    }

    /**
     * Display a listing of the TemplateWood.
     *
     * @param TemplateWoodDataTable $templateWoodDataTable
     * @return Response
     */
    public function index(TemplateWoodDataTable $templateWoodDataTable)
    {
        return $templateWoodDataTable->render('master::template_woods.index');
    }

    /**
     * Show the form for creating a new TemplateWood.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::template_woods.create');
    }

    /**
     * Store a newly created TemplateWood in storage.
     *
     * @param CreateTemplateWoodRequest $request
     *
     * @return Response
     */
    public function store(CreateTemplateWoodRequest $request)
    {
        $input = $request->all();

        $templateWood = $this->templateWoodRepository->create($input);

        Flash::success('Template Wood saved successfully.');

        return redirect(route('templateWoods.index'));
    }

    /**
     * Display the specified TemplateWood.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $templateWood = $this->templateWoodRepository->find($id);

        if (empty($templateWood)) {
            Flash::error('Template Kayu Masuk tidak ditemukan.');

            return redirect(route('templateWoods.index'));
        }

        return view('master::template_woods.show')->with('templateWood', $templateWood);
    }

    /**
     * Show the form for editing the specified TemplateWood.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,WoodCategoryDataTable $woodCategoryDataTable)
    {
        $templateWood = $this->templateWoodRepository->find($id);

        if (empty($templateWood)) {
            Flash::error('Template Kayu Masuk tidak ditemukan.');

            return redirect(route('templateWoods.index'));
        }

        return $woodCategoryDataTable
        ->with('id',$id)
        ->render('master::template_woods.edit',compact('templateWood'));
    }

    /**
     * Update the specified TemplateWood in storage.
     *
     * @param  int              $id
     * @param UpdateTemplateWoodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTemplateWoodRequest $request)
    {
        $templateWood = $this->templateWoodRepository->find($id);

        if (empty($templateWood)) {
            Flash::error('Template Kayu Masuk tidak ditemukan.');

            return redirect(route('templateWoods.index'));
        }

        $templateWood = $this->templateWoodRepository->update($request->all(), $id);

        Flash::success('Template Wood updated successfully.');

        return redirect(route('templateWoods.index'));
    }

    /**
     * Remove the specified TemplateWood from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $templateWood = $this->templateWoodRepository->find($id);

        if (empty($templateWood)) {
            Flash::error('Template Kayu Masuk tidak ditemukan.');

            return redirect(route('templateWoods.index'));
        }

        // Delete Detail
        $wood_category_id = WoodCategory::where('template_wood_id',$id);
        if($wood_category_id->count() > 0){
            foreach($wood_category_id->get() as $value)
            {
                WoodSize::where('wood_category_id',$value->id)->delete();
            }
            $wood_category_id->delete();
        }

        $this->templateWoodRepository->delete($id);

        Flash::success('Template Wood deleted successfully.');

        return redirect(route('templateWoods.index'));
    }
}
