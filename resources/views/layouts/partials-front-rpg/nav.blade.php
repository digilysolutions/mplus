 <!-- Navbar Start -->
 <div class="container-fluid mb-5">
     <div class="row border-top px-xl-5">

         <div class="col-lg-12">
             <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">


                 <div class="col-lg-3 d-block d-lg-none mb-3">
                     <a href="/" class="text-decoration-none">
                         <span> <img class="img-fluid" height="10px" width="80px"
                                 src="{{ asset('img/logo-rpg-solutions.png') }}" /></span>
                         <img class="img-fluid " height="10px" width="150px" src="{{ asset('img/logo-solutions.png') }}" />
                     </a>

                 </div>
                 <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                     <div class="navbar-nav mr-auto py-0">
                         <a href="index.html" class="nav-item nav-link active">Inicio</a>
                         <a href="shop.html" class="nav-item nav-link">Tienda</a>
                         <a href="detail.html" class="nav-item nav-link">Carrito de compras</a>
                         <a href="contact.html" class="nav-item nav-link">Contacto</a>
                     </div>
                 </div>
             </nav>

         </div>
     </div>
 </div>
 <!-- Navbar End -->


 <!-- Vendor Start -->
 <div class="container-fluid ">
     <div class="row">
         <div class="col">
             <div class="owl-carousel vendor-carousel">

                 <button class="categoria active" data-categoria="todos">Todas</button>

                 <button class="categoria" data-categoria="electronica">Electrónica</button>

                 <button class="categoria" data-categoria="ropa">Ropa</button>

                 <button class="categoria" data-categoria="hogar">Hogar</button>

                 <button class="categoria" data-categoria="deportes">Deportes</button>

                 <button class="categoria" data-categoria="juegos">Juegos</button>

                 <button class="categoria" data-categoria="libros">Libros</button>

                 <button class="categoria" data-categoria="otros">Otros</button>

             </div>
         </div>
     </div>
 </div>
 <!-- Vendor End -->
