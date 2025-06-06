@extends('layouts.app-front-rpg')
@section('header-title')
    Isla de la Juventud
@endsection

@section('css')
    <style>
        input#quantity-input {
            width: 50px;
        }

        .product-img img {
            width: 100%;
            height: 350px;
            /* Ajusta a la altura deseada */
            object-fit: cover;
            display: block;
        }

        .card-footer {
            align-items: center;
            /* Centra verticalmente */
        }
    </style>
@endsection

@section('content')




    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Detalles del Producto</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Inicio</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="/shop">Tienda</a> </p>
                <p class="m-0 px-2">-</p>

                <p class="m-0">Detalles del Producto</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5 " id="{{ $product['id'] }}">
        <div class="row px-xl-5 mb-5">

            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ $product['outstanding_image'] }}" alt="Image">
                        </div>
                        @if (isset($product->images) && is_array($product->images) && count($product->images) > 0)
                            @foreach ($product->images as $image)
                                <div class="carousel-item">
                                    <img class="w-100" src="{{ $image['path_image'] }}" alt="Image">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-orange-mobile"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-orange-mobile"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product['name'] }}</h3>

                @if ($product['brand'] != null)
                    <h6>Marca: {{ $product['brand']['name'] }}</h6>
                @endif
                <div class="d-flex align-items-center  mt-2">
                    @if ($product['discounted_price'] != null && $product['discounted_price'] > 0)
                        <h5 class="product_{{ $product['id'] }}">${{ $product['discounted_price'] }}</h5>
                        <h6 id="" class="text-muted ml-2 product_{{ $product['id'] }}  sale-price"
                            data-product-id={{ $product['id'] }}><del>${{ $product['sale_price'] ?? 0 }}</del>
                        </h6>
                    @else
                        <h5 class="product_{{ $product['id'] }}">${{ $product['sale_price'] ?? 0 }}</h5>
                    @endif
                    <h5 class="name_currencyDetailsProduct ml-3">{{ $currency }}</h5>
                </div>
                <p class="mb-4">{{ $product['description_small'] }}</p>

                @if ($product_attribute_terms != null)
                    @foreach ($product_attribute_terms['attribute'] as $attributeName => $terms)
                        <div class="d-flex mb-3">
                            <strong class="text-dark-mobile mr-3">{{ $attributeName }}:</strong>

                            @foreach ($terms as $term)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input"
                                        id="{{ strtolower($attributeName) }}-{{ strtolower($term) }}"
                                        name="{{ strtolower($attributeName) }}">
                                    <label class="custom-control-label"
                                        for="{{ strtolower($attributeName) }}-{{ strtolower($term) }}">{{ $term }}</label>
                                </div>
                            @endforeach


                        </div>
                    @endforeach
                @endif


                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="display: none;">
                        <div class="input-group-btn">
                            <button id="cart_remove" onclick="removeProductToCart(this,{{ $product['id'] }})"
                                class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input id="quantity-input" type="text" class="bg-secondary border-0 text-center" value="1">
                        <div class="input-group-btn">
                            <button id="cart_add" onclick="addProductToCart({{ $product['id'] }})"
                                class="btn btn-primary btn-plus cart_add">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a id="add-to-cart" data-id="{{ $product['id'] }}" style="display: none;"
                        class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Añadir</a>

                </div>
                <div id="pedido_compra" class="text-left mb-4 pt-2" style="display: none;">
                    <a href="{{ route('cart.showCart') }}" class="btn btn-info">Ver Pedido</a>
                    <a id="complete-purchase" href="{{ route('product.checkout', ['iddomicilio' => 0]) }}"
                        class="btn btn-primary">Finalizar compra</a>
                </div>
                @if ($product['tags'] != null)
                    <p class="mb-0"><strong>Etiquetas:</strong>
                        @foreach ($product['tags'] as $tag)
                            <span>
                                {{ $tag['name'] }} |</span>
                        @endforeach
                    </p>
                @endif

            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-5">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Descripción</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Comentarios (0)</a>
                </div>
                <div class="tab-content">
                    @if (isset($product['description']))
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Descripción del Producto</h4>
                            <p>{{ $product['description'] }}</p>

                        </div>
                    @endif
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">Comentar </h4>
                                @foreach ($comments as $comment)
                                    <div class="media mb-4">
                                        <div class="media-body">

                                            <h6>{{ $comment['writer']['first_name'] }}
                                                {{ $comment['writer']['last_name'] }} <small> - {{ $comment['date'] }}
                                                    <i></i></small></h6>
                                            @foreach ($ratings as $rating)
                                                @if ($rating['writer_id'] == $comment['writer_id'])
                                                    <div class="estrellas align-items-center justify-content-center "
                                                        id="estrellas">
                                                        @for ($index = 0; $index < $rating['rating']; $index++)
                                                            <span class="estrella seleccionada"
                                                                data-valor="{{ $index }}">&#9734;</span>
                                                        @endfor
                                                    </div>
                                                @endif
                                            @endforeach
                                            <p>{{ $comment['comment'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <div id="comments-section"></div>



                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Comentario</h4>
                                <small>Su dirección de correo electrónico no será publicada. Los campos obligatorios
                                    están marcados *</small>

                                <form id="form-comment">
                                    <div class="form-group">
                                        <label for="name">Tu Nombre *</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Tu Celular</label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Comentario *</label>
                                        <textarea id="message" name="comment" cols="30" rows="5" class="form-control"></textarea>
                                    </div>


                                    <div class="form-group mb-0">
                                        <input id="submit-comment" type="button" value="Enviar Comentario"
                                            data-id="{{ $product['id'] }}" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">También te
                puede gustar</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($randomProducts as $product)
                        <div class="card product-item border-0">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="{{ route('product.detailsproduct', ['id' => $product['id']]) }}">
                                    <img class="img-fluid w-100" src="{{ $product['outstanding_image'] }}"
                                        alt="" />
                                </a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">

                                <a class="h6 text-decoration-none text-truncate"
                                    href="{{ route('product.detailsproduct', ['id' => $product['id']]) }}">{{ $product['name'] }}
                                </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    @if ($product['discounted_price'] != null && $product['discounted_price'] > 0)
                                        <h5 class="product_{{ $product['id'] }}">${{ $product['discounted_price'] }}</h5>
                                        <h6 id=""
                                            class="text-muted ml-2 product_{{ $product['id'] }}  sale-price"
                                            data-product-id={{ $product['id'] }}>
                                            <del>${{ $product['sale_price'] ?? 0 }}</del>
                                        </h6>
                                    @else
                                        <h5 class="product_{{ $product['id'] }}">${{ $product['sale_price'] ?? 0 }}</h5>
                                    @endif
                                </div>
                            </div>


                            <div class="card-footer d-flex justify-content-between bg-light border">

                                <a href="{{ route('product.detailsproduct', ['id' => $product['id']]) }}"
                                    class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Ver
                                    Detalles</a>

                                <button type="button" class="btn btn-sm text-dark p-0 addcart"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Adicionar Carrito</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.container-fluid.pb-5').each(function() {
                // 'this' se refiere al elemento actual dentro del bucle
                productIdDetails = $(this).attr('id'); // Obtener el valor del atributo 'id'
            });
            //let productInCart = false; // Cambia a false si el producto no está en el carrito
            // $("#add-to-cart").hide();
            //  $(".input-group").hide();

            $.ajax({
                url: '/cart/existProduct/' + productIdDetails,
                method: 'GET',
                success: function(response) {

                    var exists = response['exists'];
                    var quantity = response['quantity'];

                    console.log('Existe:', exists);
                    console.log('quantity:', quantity);
                    existsProduct(exists, quantity);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }

            });
        });
        $('#add-to-cart').click(function() {

            const productId = $(this).data('id');
            addProductCart(productId, 1);

        });



        function removeProductToCart(button, idProduct) {
            console.log('Entre al remove product del cart');
            removeProductCart(button, idProduct, 1);

        }

        function addProductToCart(idProduct) {
            addProductCart(idProduct, 1);

        }
    </script>

    <script src="{{ asset('includes/app/commnet.js') }}"></script>
@endsection
