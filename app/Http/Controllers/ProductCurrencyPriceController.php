<?php

namespace App\Http\Controllers;

use App\Models\ProductCurrencyPrice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCurrencyPriceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductCurrencyPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productCurrencyPrices = ProductCurrencyPrice::all();

        return view('product-currency-price.index', compact('productCurrencyPrices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productCurrencyPrice = new ProductCurrencyPrice();

        return view('product-currency-price.create', compact('productCurrencyPrice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCurrencyPriceRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductCurrencyPrice::create($data);

        return Redirect::route('product-currency-prices.index')
            ->with('success', 'ProductCurrencyPrice '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productCurrencyPrice = ProductCurrencyPrice::find($id);

        return view('product-currency-price.show', compact('productCurrencyPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productCurrencyPrice = ProductCurrencyPrice::find($id);

        return view('product-currency-price.edit', compact('productCurrencyPrice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCurrencyPriceRequest $request, ProductCurrencyPrice $productCurrencyPrice): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productCurrencyPrice->update($data);

        return Redirect::route('product-currency-prices.index')
            ->with('success', 'ProductCurrencyPrice '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductCurrencyPrice::find($id)->delete();

        return Redirect::route('product-currency-prices.index')
            ->with('success', 'ProductCurrencyPrice '.  __('validation.attributes.successfully_removed'));
    }
}
