<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">Llámanos</a>
                <span class="text-muted px-2">:</span>
                <a class="text-dark" href="tel:5353285232">+53 53285232</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="/" class="text-decoration-none">
                <span> <img class="img-fluid" height="10px" width="100px"
                        src="{{ asset('img/logo-rpg-solutions.png') }}" /></span>
                <img class="img-fluid w-50" src="{{ asset('img/logo-solutions.png') }}" />
            </a>

        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar Productos">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-lg-3 col-6 text-right top-cart-block cart-container">
            <div class="btn  icono-shopping-cart" >
                <span class="text-secundary top-cart-info-count" id="item-count">0
                    productos</span>
                <strong  class="top-cart-info-value" id="total-price">$0.00</strong>
            </div>
            <i  class="fas fa-shopping-cart text-primary icono-shopping-cart" style="cursor: pointer;"></i>
            <div class="top-cart-content-wrapper cart-float hide" id="cart-content" style="display: none; ">
                <div class="top-cart-content">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; ">
                        <ul class="scroller" id="cart-items-list" style=" overflow: auto;">
                            <!-- Los items del carrito se añadirán aquí desde jQuery -->
                        </ul>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('cart.showCart') }}" class="btn btn-info">Ver Pedido</a>
                        <a id="complete-purchase" href="{{ route('product.checkout', ['iddomicilio' => 0]) }}"
                            class="btn btn-primary">Finalizar compra</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- Topbar End -->
