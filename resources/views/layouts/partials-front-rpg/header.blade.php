<meta charset="utf-8" />
<title>RPG Solutions - @yield('header-title')</title>
 <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link href="" rel="icon" />

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
    border: 1px solid #007bff;
    background: #fff;
    font-weight: 600;
    transition: 0.3s;
  }
  .categoria:hover {
    background-color: #007bff;
    color: #fff;
    transform: scale(1.05);
  }
  .categoria.active {
    background-color: #0056b3;
    color: #fff;
  }
</style>
