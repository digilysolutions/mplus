@extends('layouts.app')
@section('header-title')
    Isla de la Juventud - Tienda
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-orange-mobile" href="/">Inicio</a>
                    <span class="breadcrumb-item text-dark-mobile active ">Tienda</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">

                <form id="filterForm">
                <!-- Categoria Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtrar por
                        Categoría</span></h5>
                <div class="bg-light p-4 mb-30">
                  
                    @foreach ($categories as $category)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" value="{{ $category['id'] }}" class="custom-control-input category-checkbox"
                            id="category_{{ $category['id'] }}" name="category_ids[]"
                            @if(is_array(request('category_ids')) && in_array($category['id'], request('category_ids'))) checked @endif>
                        <label class="custom-control-label" for="category_{{ $category['id'] }}">{{ $category['name'] }}</label>
                        <span class="badge border font-weight-normal">{{ count($category['products']) }}</span>
                    </div>
                @endforeach
                    
                </div>
                <!-- Categoria End -->

                <!-- Categoria Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtrar por
                        Marcas</span></h5>
                <div class="bg-light p-4 mb-30">
                    
                        @foreach ($brands as $brand)
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" value="{{ $brand->id }}"
                                    class="custom-control-input brand-checkbox" id="brand_{{ $brand->id }}"
                                    name="brand_ids[]" @if (is_array(request('brand_ids')) && in_array($brand->id, request('brand_ids'))) checked @endif>
                                <label class="custom-control-label"
                                    for="brand_{{ $brand->id }}">{{ $brand->name }}</label>
                                <span class="badge border font-weight-normal">{{ $brand->products->count() }}</span>
                            </div>
                        @endforeach
                   

                </div>
                <!-- Categoria End -->
            </form>

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->

            <div class="col-lg-9 col-md-8 container-fluid pt-5 pb-3 ">
                <div class="row px-xl-5" id="productsContainer">

                 @include('app.partials.products')

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
        <!-- Paginación -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                Mostrando {{ $productsPaginator->firstItem() }} - {{ $productsPaginator->lastItem() }} de
                {{ $productsPaginator->total() }} productos
            </div>
            <div>
                {{ $productsPaginator->links('pagination::bootstrap-4') }} <!-- Usar paginación de Bootstrap -->
            </div>
        </div>
    </div>

    <!-- Shop End -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
    $('#filterForm input[type="checkbox"]').change(function() {
        let selectedBrands = [];
        let selectedCategories = [];

        // Obtener todos los checkboxes de marcas seleccionados
        $('.brand-checkbox:checked').each(function() {
            selectedBrands.push($(this).val());
        });

        // Obtener todos los checkboxes de categorías seleccionados
        $('.category-checkbox:checked').each(function() {
            selectedCategories.push($(this).val());
        });

        $.ajax({
            url: "{{ route('filterProducts') }}", // Cambia esto a la ruta que maneja la lógica del filtrado
            method: "GET",
            data: { 
                brand_ids: selectedBrands,
                category_ids: selectedCategories // Aquí agregas las categorías seleccionadas
            },
            success: function(response) {
                $('#productsContainer').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
    </script>

@endsection
