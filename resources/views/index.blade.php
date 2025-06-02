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

        @keyframes fadeOutSlow {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .fade-out-slow {
            animation: fadeOutSlow 1.5s forwards;
            /* duración de 1.5 segundos */
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
                                        data-product-id="{{ $product->id }}">{{ isset($product->categories) && count($product->categories) > 0 ? $product->categories[0]->code_currency_default : '' }}</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach ($countryCurrencies as $countryCurrency)
                                        <button class="dropdown-item" type="button"
                                            onclick="changeCurrency('{{ $countryCurrency->currency->code }}', {{ $product->id }})">
                                            <strong class="">{{ $countryCurrency->currency->code }}</strong>
                                        </button>
                                    @endforeach
                                </div>
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

    <!-- Modal de notificación -->
    <div class="modal fade" id="productAddedModal" tabindex="-1" aria-labelledby="productAddedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #f0f8ff;">
                <div class="modal-header">
                    <h5 class="modal-title" id="productAddedLabel">Producto añadido al carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p><strong id="productName"></strong> ha sido añadido a tu carrito.</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.addcart').on('click', function() {
                // Obtener datos del botón
                var productName = $(this).data('name');

                // Rellenar los datos en el modal
                $('#productName').text(productName);

                // Mostrar el modal usando Bootstrap 5 con jQuery
                var myModal = new bootstrap.Modal(document.getElementById('productAddedModal'));
                myModal.show();

                // Después de mostrar, configurar la animación de cierre lento
                setTimeout(function() {
                    // Agregar clase para animar la salida
                    $('#productAddedModal .modal-dialog').addClass('fade-out-slow');

                    // Cuando termine la animación, cerrar el modal
                    $('#productAddedModal .modal-dialog').on('animationend', function() {
                        myModal.hide();
                        // Remover la clase para futuras veces
                        $('#productAddedModal .modal-dialog').removeClass('fade-out-slow');
                    });
                }, 1500); // espera que la animación lenta termine, ajusta si quieres más o menos tiempo
            });
        });
    </script>
@endsection
