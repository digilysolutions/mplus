
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
               <div class="col-lg-3  mb-3">
            <a href="/" class="text-decoration-none">
               <span> <img class="img-fluid" height="10px" width="100px" src="{{asset('img/RPGsolutions.png')}}"/></span>

            </a>

        </div>
                <p>Nuestra misión es ofrecer una amplia variedad de productos de calidad, brindando a nuestros clientes en La Habana soluciones confiables y accesibles para sus necesidades diarias. Nos comprometemos a proporcionar un excelente servicio, innovación y satisfacción, convirtiéndonos en su aliado de confianza en cada compra.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Calle 25 #26 entre Marina y Hospital</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><a href="mail:commercialsolutions70@gmail.com"> commercialsolutions70@gmail.com</a></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><a href="tel:5359294241"> 5 9294241</a> /<a href="tel:5353285232"> 53285232</a></p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">

                    <div class="col-md-12 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Contáctanos</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Nombre" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Correo"
                                    required="required" />
                            </div>
                              <div class="form-group">
                                <textarea class="form-control border-0 py-4" placeholder="Mensaje"></textarea>
                              </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">RPGSOLUTIONS</a>. Todos los derechos reservados. Diseñado por
                    <a class="text-dark font-weight-semi-bold" href="https://digilysolutions.com">Digily Solutions</a>
                </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->

<!-- Botón flotante -->
<div id="floatCartBtn" style="position: fixed; bottom: 20px; left: 20px; z-index: 1050; display: block;">
    <div class="d-flex align-items-center bg-white border rounded p-2 shadow" style="cursor:pointer;">
        <div class="mr-2">
            <i class="fas fa-shopping-cart text-primary"></i>
        </div>
        <div>
            <div class="d-flex justify-content-between w-100">
                <span class="text-dark" id="float-item-count">0 productos</span>
                <strong class="ml-2" id="float-total-price">$0.00</strong>
            </div>
        </div>
    </div>
</div>

<!-- Panel del carrito -->
<div id="cartContent" style="display:none; position: fixed; bottom: 70px; left: 20px; right: 20px; max-height: 400px; overflow-y: auto; z-index: 1050; background: #fff; border: 1px solid #ccc; border-radius: 8px; padding: 10px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
       
        <button id="closeCart" class="btn btn-sm btn-secondary">Cerrar</button>
    </div>
    <ul class="list-group mb-3" id="cartItemsList">
        <!-- Items del carrito aquí -->
        <!-- Ejemplo: <li class="list-group-item">Producto 1 - $10</li> -->
    </ul>
    <div class="d-flex justify-content-between">
        <a href="{{ route('cart.showCart') }}" class="btn btn-info">Ver Pedido</a>
        <a href="{{ route('product.checkout', ['iddomicilio' => 0]) }}" class="btn btn-primary">Finalizar compra</a>
    </div>
</div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

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
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script type="module" src="{{ asset('includes/api.js') }}"></script>
<script type="module" src="{{ asset('includes/main.js') }}"></script>
<script src="{{ asset('includes/app/cart.js') }}"></script>
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
        
    $(document).ready(function() {
    // Mostrar/Ocultar carrito al hacer clic en botón
    $('#floatCartBtn').on('click', function() {
        $('#cartContent').toggle();
    });
    $('#closeCart').on('click', function() {
        $('#cartContent').hide();
    });

    // Controlar visibilidad del botón al hacer scroll
    $(window).on('scroll', function() {
        var scrollPos = $(window).scrollTop();
        if (scrollPos > 100) { // Si está más abajo de 100px, mostrar
            $('#floatCartBtn').fadeIn();
        } else {
            $('#floatCartBtn').fadeOut();
            $('#cartContent').hide(); // opcional: esconder el panel si está abierto
        }
    });

    // Inicialmente, ocultar el botón si quieres que solo aparezca al hacer scroll
    $('#floatCartBtn').hide(); // Comienza oculto
});
    

$(document).ready(function() {
        // Manejador para mostrar y ocultar el carrito en móvil
        $('.top-cart-info').click(function() {
            $('#cart-content-phone').toggle(); // Muestra/oculta el carrito en móvil
        });
    });



    $(document).ready(function() {
        $.ajax({
            url: '/cart/productExchangeRate', // Cambia esta URL según corresponda a tu caso
            method: 'GET',
            success: function(response) {

                console.log(response);

                updateCartDisplay(response);
            },
            error: function(err) {
                console.error('Error al obtener el carrito:', err);
            } // Asegúrate de que esta llave tenga una coma antes
        });

        const cartContent = $('.top-cart-content');
        // Asegurarse de que el carrito no se muestre al abrir la página
        cartContent.hide(); // Asegura que el carrito esté oculto al cargar la página.

        // Muestra el carrito al pasar el cursor
        $('#cart-info, .icono-shopping-cart, .top-cart-content, .top-cart-block').hover(function(e) {
            if (cartItems.length != 0) {
                e.stopPropagation();
                cartContent.show();
            }
        });
        $('#cart-info-phone, .top-cart-content-phone').hover(function(e) {
            if (cartItems.length != 0) {
                e.stopPropagation();
                cartContent.show();
            }
        });

        // Manejo del clic para mantener el carrito visible
        $('#cart-info, .icono-shopping-cart').click(function(e) {
            e.stopPropagation(); // Evitar que el clic cierre el carrito
            const cartContent = $('#cart-content');
            if (cartItems.length != 0) {
                // Alternar visibilidad
                if (cartContent.is(':visible')) {
                    cartContent.hide(); // Si ya está visible, entonces oculta

                } else {
                    cartContent.show(); // Si no, mostrarlo
                    // Actualiza el carrito al mostrar
                    cartContent.stop(true, true).fadeIn(100); // Mostrar el contenido del carrito

                }
            }
        });
         // Manejo del clic para mantener el carrito visible
         $('#cart-info-phone, .fa-shopping-cart-phone').click(function(e) {
            e.stopPropagation(); // Evitar que el clic cierre el carrito
            const cartContent = $('#cart-content-phone');
            if (cartItems.length != 0) {
                // Alternar visibilidad
                if (cartContent.is(':visible')) {
                    cartContent.hide(); // Si ya está visible, entonces oculta
                } else {
                    cartContent.show(); // Si no, mostrarlo
                    // Actualiza el carrito al mostrar
                    cartContent.stop(true, true).fadeIn(100); // Mostrar el contenido del carrito
                }
            }
        });



        // Cierra el carrito si se hace clic en cualquier parte de la página fuera del carrito
        $(document).click(function() {
            if (cartContent.is(':visible')) {
               $('#cart-content').hide();// Oculta el carrito al hacer clic fuera

            }
        });
        //adicionar producto
        $(document).on('click', '.addcart', function() {
            const productId = $(this).closest('.addcart').data('id');

            addProductCart(productId, 1);
        });

        $(document).on('click', '.increase-quantity', function() {
            const id = $(this).data('id');
            addCartItems(id);
        });

        $(document).on('click', '.remove-item', function() {
            const id = $(this).data('id');
            cartItems = cartItems.filter(item => item.id !== id);
            removeProductCart(null, id, 0);

        });

        $(document).on('click', '.decrease-quantity', function() {
            const id = $(this).data('id');

            const item = cartItems.find(item => item.id === id);

            if (item && item.quantity > 1) {
                item.quantity--;
                console.log( cartItems);
            } else {
                cartItems = cartItems.filter(item => item.id !== id)

                console.log( cartItems);
            }
            removeProductCart(null, id, 1);
        });
    });
</script>
