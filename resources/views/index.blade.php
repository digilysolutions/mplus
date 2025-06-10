@extends('layouts.app-front-rpg')
@section('header-title')
    Tienda ONLINE
@endsection

@section('css')
    <style>
        .product-img img {
            width: 100%;
            height: 350px;
            /* Ajusta a la altura deseada */
            object-fit: cover;
            display: block;
        }
    </style>
@endsection
@section('content')
    <!-- Products Start -->

    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Productos</span></h2>
        </div>

        <div class="row px-xl-5 pb-3">
            @foreach ($featuredProducts as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">

                            <a href="{{ route('product.detailsproduct', ['id' => $product->id]) }}">
                                <img class="img-fluid w-100" src="{{ $product->outstanding_image }}" alt="" />
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">

                            <a class="" href="{{ route('product.detailsproduct', ['id' => $product->id]) }}">
                                <h5 class="text-truncate mb-3">{{ $product->name }}</h5>
                            </a>
                            <div class="d-flex justify-content-center">
                                @if ($product->discounted_price != null && $product->discounted_price > 0)
                                    <h6 class="product_{{ $product->id }}">${{ $product->discounted_price }}</h6>
                                    <h6 id="" class="text-muted ml-2 product_{{ $product->id }}  sale-price"
                                        data-product-id={{ $product->id }}><del>${{ $product->sale_price ?? 0 }}</del>
                                    </h6>
                                @else
                                    <h6 class="product_{{ $product->id }}">${{ $product->sale_price ?? 0 }}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <div class="btn-group mx-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-money-bill icon-header text-primary"></i>
                                    <span class="selectedCurrency"
                                        data-product-id="{{ $product->id }}">{{ $product->code_currency_default }}</span>
                                </button>
                                @if (is_array($product->supported_currencies))
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"
                                            onclick="changeCurrency('{{ $product->code_currency_default }}', {{ $product->id }})">
                                            <strong class="">{{ $product->code_currency_default }}</strong>
                                        </button>

                                        @foreach ($product->supported_currencies as $countryCurrency)
                                            @if ($countryCurrency != $product->code_currency_default)
                                                <button class="dropdown-item" type="button"
                                                    onclick="changeCurrency('{{ $countryCurrency }}', {{ $product->id }})">
                                                    <strong class="">{{ $countryCurrency }}</strong>
                                                </button>
                                            @endif
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('product.detailsproduct', ['id' => $product->id]) }}"
                                class="btn btn-sm text-dark "><i class="fas fa-eye text-primary mr-1"></i>Ver
                                Detalles</a>


                            <button type="button" class="btn btn-sm text-dark p-0  addcart" data-id={{ $product->id }}
                                data-name={{ $product->name }} data-toggle="tooltip" data-placement="bottom"
                                data-original-title="Añadir al Carrito"><i
                                    class="fas fa-shopping-cart text-primary mr-1 "></i>Adicionar Carrito
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Products End -->
@endsection
@section('js')
    <script></script>
@endsection
