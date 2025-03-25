<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $stocks = Stock::all();

        return view('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $stock = new Stock();

        return view('stock.create', compact('stock'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
        Stock::create($data);

        return Redirect::route('stocks.index')
            ->with('success', 'Stock '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $stock = Stock::find($id);

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $stock = Stock::find($id);

        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, Stock $stock): RedirectResponse
    {
        $data =$request->all();
       $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
        $stock->update($data);

        return Redirect::route('stocks.index')
            ->with('success', 'Stock '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Stock::find($id)->delete();

        return Redirect::route('stocks.index')
            ->with('success', 'Stock '.  __('validation.attributes.successfully_removed'));
    }
}
