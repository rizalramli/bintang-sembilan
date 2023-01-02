<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\TemplateWoodOutDataTable;
use Modules\Master\Http\Requests;
use Modules\Master\Http\Requests\CreateTemplateWoodOutRequest;
use Modules\Master\Http\Requests\UpdateTemplateWoodOutRequest;
use Modules\Master\Repositories\TemplateWoodOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\DataTables\WoodCategoryOutDataTable;
use Modules\Master\Models\WoodCategoryOut;
use Modules\Master\Models\WoodSizeOut;
use Response;

class TemplateWoodOutController extends AppBaseController
{
    /** @var  TemplateWoodOutRepository */
    private $templateWoodOutRepository;

    public function __construct(TemplateWoodOutRepository $templateWoodOutRepo)
    {
        $this->templateWoodOutRepository = $templateWoodOutRepo;
    }

    /**
     * Display a listing of the TemplateWoodOut.
     *
     * @param TemplateWoodOutDataTable $templateWoodOutDataTable
     * @return Response
     */
    public function index(TemplateWoodOutDataTable $templateWoodOutDataTable)
    {
        return $templateWoodOutDataTable->render('master::template_wood_outs.index');
    }

    /**
     * Show the form for creating a new TemplateWoodOut.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::template_wood_outs.create');
    }

    /**
     * Store a newly created TemplateWoodOut in storage.
     *
     * @param CreateTemplateWoodOutRequest $request
     *
     * @return Response
     */
    public function store(CreateTemplateWoodOutRequest $request)
    {
        $input = $request->all();

        $templateWoodOut = $this->templateWoodOutRepository->create($input);

        Flash::success('Template kayu keluar berhasil disimpan.');

        return redirect(route('templateWoodOuts.index'));
    }

    /**
     * Display the specified TemplateWoodOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $templateWoodOut = $this->templateWoodOutRepository->find($id);

        if (empty($templateWoodOut)) {
            Flash::error('Template kayu keluar');

            return redirect(route('templateWoodOuts.index'));
        }

        return view('master::template_wood_outs.show')->with('templateWoodOut', $templateWoodOut);
    }

    /**
     * Show the form for editing the specified TemplateWoodOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,WoodCategoryOutDataTable $woodCategoryOutDataTable)
    {
        $templateWoodOut = $this->templateWoodOutRepository->find($id);

        if (empty($templateWoodOut)) {
            Flash::error('Template kayu keluar');

            return redirect(route('templateWoodOuts.index'));
        }

        return $woodCategoryOutDataTable
        ->with('id', $id)
        ->render('master::template_wood_outs.edit',compact('templateWoodOut'));
    }

    /**
     * Update the specified TemplateWoodOut in storage.
     *
     * @param  int              $id
     * @param UpdateTemplateWoodOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTemplateWoodOutRequest $request)
    {
        $templateWoodOut = $this->templateWoodOutRepository->find($id);

        if (empty($templateWoodOut)) {
            Flash::error('Template kayu keluar');

            return redirect(route('templateWoodOuts.index'));
        }

        $templateWoodOut = $this->templateWoodOutRepository->update($request->all(), $id);

        Flash::success('Template kayu keluar berhasil diperbarui.');

        return redirect(route('templateWoodOuts.index'));
    }

    /**
     * Remove the specified TemplateWoodOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $templateWoodOut = $this->templateWoodOutRepository->find($id);

        if (empty($templateWoodOut)) {
            Flash::error('Template kayu keluar');

            return redirect(route('templateWoodOuts.index'));
        }

        // Delete Detail
        $wood_category_out_id = WoodCategoryOut::where('template_wood_out_id',$id);
        if($wood_category_out_id->count() > 0){
            foreach($wood_category_out_id->get() as $value)
            {
                WoodSizeOut::where('wood_category_out_id',$value->id)->delete();
            }
            $wood_category_out_id->delete();
        }

        $this->templateWoodOutRepository->delete($id);

        Flash::success('Template kayu keluar berhasil dihapus.');

        return redirect(route('templateWoodOuts.index'));
    }
}
