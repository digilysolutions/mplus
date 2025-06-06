<meta charset="utf-8" />
<title>RPG Solutions - @yield('header-title')</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="RPG Solutions" name="keywords">
<meta content="RPG Solutions" name="description">


<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link href="{{ asset('img/logo-rpg.png') }}" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

<!-- Libraries Stylesheet -->
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

<style>
    /* Estilo de las categorías */
    .categoria {
        flex: 0 0 auto;
        margin: 0 15px;
        padding: 8px 20px;
        border-radius: 20px;
        border: 1px solid #575756;
        background: #fff;
        font-weight: 600;
        transition: 0.3s;
    }

    .categoria:hover {
        background-color: #575756;
        color: #fff;
        transform: scale(1.05);
    }

    .categoria.active {
        background-color: #575756;
        color: #fff;
    }



    /* Contenedor del carrito, relativo para posicionar la ventana flotante */
    .cart-container {
        position: relative;
    }

    /* La ventana flotante */
    #cart-content {
        display: none;
        /* Oculta por defecto, controla con JS */
        position: absolute;
        top: 100%;
        /* debajo del botón */
        right: 0;
        /* alineado a la derecha del contenedor */
        min-width: 300px;
        /* tamaño mínimo */
        max-width: 90%;
        /* que no se salga en pantallas pequeñas */
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        padding: 10px;
        overflow: auto;
        /* para scroll si el contenido es largo */
        max-height: 400px;
        /* ajusta según preferencia */
    }

    /* Hacer que el contenido se ajuste y sea grande si hay mucho texto */
    #cart-content .top-cart-content {
        width: 100%;
    }

    /* Solo en pantallas pequeñas, esconder el contenido y solo mostrar el icono */
    @media (max-width: 768px) {

        /* Oculta los textos en dispositivos pequeños, solo icono */
        #cart-content {
            display: none;
            /* asegúrate de que JS controle su visibilidad */
        }

        /* Aquí puedes agregar clases o estilos específicos para el icono en móvil si quieres, pero en tu HTML solo muestra el icono en móvil */
    }

    /* Ocultar en pantallas pequeñas los textos y mostrar solo el icono */
    @media (max-width: 768px) {

        /* Ocultar los textos */
        #item-count,
        #total-price {
            display: none;
        }

        /* Mostrar solo el icono del carrito */
        .icono-shopping-cart {
            display: inline-block;
        }
    }

    /* En pantallas grandes, mostrar todo normalmente */
    @media (min-width: 769px) {

        #item-count,
        #total-price {
            display: inline-block;
        }

        .icono-shopping-cart {
            display: inline-block;
        }
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
