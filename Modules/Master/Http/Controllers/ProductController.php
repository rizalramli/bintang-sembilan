<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\ProductDataTable;
use Modules\Master\Http\Requests;
use Modules\Master\Http\Requests\CreateProductRequest;
use Modules\Master\Http\Requests\UpdateProductRequest;
use Modules\Master\Repositories\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('master::products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        Flash::success('Produk berhasil disimpan.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produk tidak ditemukan.');

            return redirect(route('products.index'));
        }

        return view('master::products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produk tidak ditemukan.');

            return redirect(route('products.index'));
        }

        return view('master::products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produk tidak ditemukan.');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Produk berhasil diperbarui.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produk tidak ditemukan.');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Produk berhasil dihapus.');

        return redirect(route('products.index'));
    }
}
