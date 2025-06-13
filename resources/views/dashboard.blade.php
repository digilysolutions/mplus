@extends('layouts.app-admin')
@section('title-header-admin')
    RPG Solutions
@endsection
@section('content-admin')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        @php
                            \Carbon\Carbon::setLocale('es');
                            $fechaHoy = \Carbon\Carbon::now()->translatedFormat('l, F j, Y');
                        @endphp

                        <section>
                            <p>La fecha de hoy es: {{ $fechaHoy }}</p>
                        </section>
                        <h3 class="mb-3">¡Bienvenido al Panel de Administración de tu Tienda!</h3>
                        <p class="mb-0 mr-4">Desde aquí puedes gestionar tus productos, monitorear ventas y analizar el
                            rendimiento de tu tienda.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="{{ asset('/admin/product/1.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Total de ventas</p>
                                        <h4>$31.50</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="85">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="{{ asset('/admin/product/2.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Total Productos</p>
                                        <h4>4598</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-danger iq-progress progress-1" data-percent="70">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('/admin/product/3.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Ganancias</p>
                                        <h4>$4589</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-lg-12">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        <h3 class="mb-3"><h3 class="mb-3">Indicadores Clave de Desempeño (KPI) del Negocio</h3>
                        <p class="mb-0 mr-4"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="{{ asset('admin/product/7.jpg') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Ventas</p>
                                        <h4>$0</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="85">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="{{ asset('admin/product/4.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Productos</p>
                                        <h4>0</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-danger iq-progress progress-1" data-percent="70">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('admin/product/3.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Clientes</p>
                                        <h4>25</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('admin/product/2.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Pedidos</p>
                                        <h4>{{ $oreder_notComplete }}</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info">
                                        <img src="{{ asset('admin/product/1.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Inventario</p>
                                        <h4>12</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info">
                                        <img src="{{ asset('admin/product/01.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Ganancias</p>
                                        <h4>3</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
<div class="col-lg-8">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Top Ventas</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton006"
                                    data-toggle="dropdown">
                                    Este Mes<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right shadow-none"
                                    aria-labelledby="dropdownMenuButton006">
                                    <a class="dropdown-item" href="#">Año</a>
                                    <a class="dropdown-item" href="#">Mes</a>
                                    <a class="dropdown-item" href="#">Semana</a>
                                    <a class="dropdown-item" href="#">Día</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled row top-product mb-0">
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="bg-warning-light rounded">
                                            <img src="../assets/images/product/01.png" class="style-img img-fluid m-auto p-3" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Organic Cream</h5>
                                            <p class="mb-0">789 Item</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="bg-danger-light rounded">
                                            <img src="../assets/images/product/02.png" class="style-img img-fluid m-auto p-3" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Rain Umbrella</h5>
                                            <p class="mb-0">657 Item</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="bg-info-light rounded">
                                            <img src="../assets/images/product/03.png" class="style-img img-fluid m-auto p-3" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Serum Bottle</h5>
                                            <p class="mb-0">489 Item</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="bg-success-light rounded">
                                            <img src="../assets/images/product/02.png" class="style-img img-fluid m-auto p-3" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Organic Cream</h5>
                                            <p class="mb-0">468 Item</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between p-0">
                        <div class="header-title">
                            <h4 class="card-title mb-0">Los más Rentables</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div><a href="#" class="btn btn-primary view-btn font-size-14">Ver Todos</a></div>
                        </div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height-helf">
                    <div class="card-body card-item-right">
                        <div class="d-flex align-items-top">
                            <div class="bg-warning-light rounded">
                                <img src="../assets/images/product/04.png" class="style-img img-fluid m-auto" alt="image">
                            </div>
                            <div class="style-text text-left">
                                <h5 class="mb-2">Coffee Beans Packet</h5>
                                <p class="mb-2">Total de Ventas : 45897</p>
                                <p class="mb-0">Total Ganado : $45,89 M</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height-helf">
                    <div class="card-body card-item-right">
                        <div class="d-flex align-items-top">
                            <div class="bg-danger-light rounded">
                                <img src="../assets/images/product/05.png" class="style-img img-fluid m-auto" alt="image">
                            </div>
                            <div class="style-text text-left">
                                <h5 class="mb-2">Bottle Cup Set</h5>
                                <p class="mb-2">Total de Ventas : 44359</p>
                                <p class="mb-0">Total Ganado : $45,50 M</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Notificaciones</h4>
                        </div>

                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between p-0">
                        <div class="header-title">
                            <h4 class="card-title mb-0">Conectados</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div><a href="#" class="btn btn-primary view-btn font-size-14">Ver todos</a></div>
                        </div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height-hel ">
                    <a href="#" class="iq-sub-card">
                        <div class="media align-items-center cust-card py-3 border-bottom">

                            <div class="media-body ml-3">
                                <h4 class="mb-2">Yasniel Reyes</h4>
                                <div class="d-flex align-items-center justify-content-between style-text">


                                    <small class="text-dark mr-5"><b>11 : 30 pm</b></small>

                                </div>
                                <small class="mb-0"> Tiempo: 25 min </small>
                            </div>

                        </div>

                    </a>

                </div>
                <div class="card card-block card-stretch card-height-helf">
                    <a href="#" class="iq-sub-card">
                        <div class="media align-items-center cust-card py-3 border-bottom">

                            <div class="media-body ml-3">
                                <h4 class="mb-2">Jorge Barrameda</h4>
                                <div class="d-flex align-items-center justify-content-between style-text">

                                    <small class="text-dark mr-5"><b>2:45 am</b></small>
                                </div>
                                <small class="mb-0"> Tiempo: 60 min </small>
                            </div>

                        </div>

                    </a>
                </div>
            </div>


        </div>
        <!-- Page end  -->
    </div>
@endsection
