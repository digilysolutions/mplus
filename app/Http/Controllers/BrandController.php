<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $brands = Brand::all();

        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $brand = new Brand();

        return view('brand.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
        Brand::create($data);

        return Redirect::route('brands.index')
            ->with('success', __('Brand').__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $brand = Brand::find($id);

        return view('brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $brand = Brand::find($id);

        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand): RedirectResponse
    {
        $data =$request->all();
        $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
        $brand->update($data);

        return Redirect::route('brands.index')
            ->with('success', __('Brand') .__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Brand::find($id)->delete();

        return Redirect::route('brands.index')
            ->with('success',__('Brand').  __('validation.attributes.successfully_removed'));
    }

    public function addBrand(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Crear un nuevo modelo usando los datos proporcionados
        $brandProduct = Brand::create([
            'name' => $request->name
        ]);
        // Retornar una respuesta JSON con los datos del modelo creado
        return response()->json([
            'brand' => [
                'data' => $brandProduct
            ]
        ], 201);
    }
}
