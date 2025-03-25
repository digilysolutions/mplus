<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $customer = new Customer();

        return view('customer.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
        Customer::create($data);

        return Redirect::route('customers.index')
            ->with('success', __('Customer').__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $customer = Customer::find($id);

        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $customer = Customer::find($id);

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer): RedirectResponse
    {
        $data =$request->all();
       $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
        $customer->update($data);

        return Redirect::route('customers.index')
            ->with('success', __('Customer').__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Customer::find($id)->delete();

        return Redirect::route('customers.index')
            ->with('success', __('Customer').  __('validation.attributes.successfully_removed'));
    }
}
