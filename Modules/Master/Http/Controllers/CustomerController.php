<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\CustomerDataTable;
use Modules\Master\Http\Requests\CreateCustomerRequest;
use Modules\Master\Http\Requests\UpdateCustomerRequest;
use Modules\Master\Repositories\CustomerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CustomerController extends AppBaseController
{
    /** @var  CustomerRepository */
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the Customer.
     *
     * @param CustomerDataTable $customerDataTable
     * @return Response
     */
    public function index(CustomerDataTable $customerDataTable)
    {
        return $customerDataTable->render('master::customers.index');
    }

    /**
     * Show the form for creating a new Customer.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::customers.create');
    }

    /**
     * Store a newly created Customer in storage.
     *
     * @param CreateCustomerRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $input = $request->all();

        $customer = $this->customerRepository->create($input);

        Flash::success('Customer berhasil disimpan.');

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified Customer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer tidak ditemukan');

            return redirect(route('customers.index'));
        }

        return view('master::customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified Customer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer tidak ditemukan');

            return redirect(route('customers.index'));
        }

        return view('master::customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified Customer in storage.
     *
     * @param  int              $id
     * @param UpdateCustomerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerRequest $request)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer tidak ditemukan');

            return redirect(route('customers.index'));
        }

        $customer = $this->customerRepository->update($request->all(), $id);

        Flash::success('Customer berhasil diperbarui.');

        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified Customer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer tidak ditemukan');

            return redirect(route('customers.index'));
        }

        $this->customerRepository->delete($id);

        Flash::success('Customer berhasil dihapus.');

        return redirect(route('customers.index'));
    }
}
