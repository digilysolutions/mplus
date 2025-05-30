
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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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
                cartContent.fadeOut(200); // Oculta el carrito al hacer clic fuera
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
