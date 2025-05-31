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
       // $('#cart-content').removeClass('hide'); // Asegura que el carrito esté oculto al cargar la página.
$('#cart-content').removeClass('hide');

        // Muestra el carrito al pasar el cursor
        $('#cart-info, .icono-shopping-cart, .top-cart-content, .top-cart-block').hover(function(e) {
            if (cartItems.length != 0) {
                e.stopPropagation();
                $('#cart-content').addClass('hide');
            }
        });
        $('#cart-info-phone, .top-cart-content-phone').hover(function(e) {
            if (cartItems.length != 0) {
                e.stopPropagation();
               $('#cart-content').addClass('hide');
            }
        });

        // Manejo del clic para mantener el carrito visible
        $('#cart-info, .icono-shopping-cart').click(function(e) {
            e.stopPropagation(); // Evitar que el clic cierre el carrito
            const cartContent = $('#cart-content');
            if (cartItems.length != 0) {
                // Alternar visibilidad
                if (cartContent.is(':visible')) {
                    $('#cart-content').removeClass('hide'); // Si ya está visible, entonces oculta
                } else {
                    $('#cart-content').addClass('hide'); // Si no, mostrarlo
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
                    $('#cart-content').removeClass('hide'); // Si ya está visible, entonces oculta
                } else {
                   $('#cart-content').addClass('hide'); // Si no, mostrarlo
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
                console.log(cartItems);
            } else {
                cartItems = cartItems.filter(item => item.id !== id)

                console.log(cartItems);
            }
            removeProductCart(null, id, 1);
        });
    });
</script>
