@extends('layouts.app-admin')
@section('title-header-admin')
    RPG Solutions
@endsection
@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">

                        <h3 class="mb-3">¡Panel de Administración de tu Tienda!</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        @php
                            \Carbon\Carbon::setLocale('es');
                            $fechaHoy = \Carbon\Carbon::now()->translatedFormat('l, F j, Y');
                        @endphp


                        <div class="card border-success">
                            <div class="card-body text-success">
                                <h6 class="card-title text-success">La fecha de hoy es: {{ $fechaHoy }}</h6>
                                <p class="card-text">Desde aquí puedes gestionar tus productos, monitorear ventas y analizar
                                    el
                                    rendimiento de tu tienda.</p>
                            </div>
                        </div>

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
                                        <img src="{{ asset('/admin/images/product/1.png') }}" class="img-fluid"
                                            alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Total ventas</p>
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
                                        <img src="{{ asset('/admin/images/product/2.png') }}" class="img-fluid"
                                            alt="image">
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
                                        <img src="{{ asset('/admin/images/product/3.png') }}" class="img-fluid"
                                            alt="image">
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
                        <h3 class="mb-3">
                            <h3 class="mb-3">Indicadores Clave de Desempeño (KPI) del Negocio</h3>
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
                                        <img src="{{ asset('/admin/images/product/1.png') }}" class="img-fluid"
                                            alt="image">
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
                                        <img src="{{ asset('/admin/images/product/2.png') }}" class="img-fluid"
                                            alt="image">
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
                                        <img src="{{ asset('admin/images/user/a4.png') }}" class="img-fluid" alt="image">
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
                                        <img src="{{ asset('admin/images/product/01.png') }}" class="img-fluid"
                                            alt="image">
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
                                        <img src="{{ asset('/admin/images/product/2.png') }}" class="img-fluid"
                                            alt="image">
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
                                        <img src="{{ asset('/admin/images/product/1.png') }}" class="img-fluid"
                                            alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Ganancias</p>
                                        <h4>$3</h4>
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
                                            <img src="../assets/images/product/01.png"
                                                class="style-img img-fluid m-auto p-3" alt="image">
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
                                            <img src="../assets/images/product/02.png"
                                                class="style-img img-fluid m-auto p-3" alt="image">
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
                                            <img src="../assets/images/product/03.png"
                                                class="style-img img-fluid m-auto p-3" alt="image">
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
                                            <img src="../assets/images/product/02.png"
                                                class="style-img img-fluid m-auto p-3" alt="image">
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
                                <img src="../assets/images/product/04.png" class="style-img img-fluid m-auto"
                                    alt="image">
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
                                <img src="../assets/images/product/05.png" class="style-img img-fluid m-auto"
                                    alt="image">
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

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Órdenes</h5>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <p class="card-text text-muted mb-2">Pendiente </p>
                                    <div class="progress progress-slim">
                                        <div class="progress-bar bg-light" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="card-text text-muted mb-2">Procesando</p>
                                    <div class="progress progress-slim">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="card-text text-muted mb-2">Enviado</p>
                                    <div class="progress progress-slim">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"
                                            aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="card-text text-muted mb-2">Completada</p>
                                    <div class="progress progress-slim">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="card-text text-muted mb-2">Cancelada</p>
                                    <div class="progress progress-slim">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 85%"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-muted mb-0">
                                    Nota: Cada 10 minutos se actualizará
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Últimas órdenes modificadas   </h5>
                            <div class="table-responsive">
                                <table class="table center-aligned-table">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No. Orden</th>
                                            <th class="d-none d-sm-table-cell">Comprador</th>
                                            <th class="d-none d-sm-table-cell">Método de Pago</th>
                                            <th>Estado</th>
                                            <th>Total</th>
                                            <th class="d-none d-sm-table-cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Yasniel 7</td>
                                            <td class="d-none d-sm-table-cell">Transferencia</td>
                                            <td><label class="badge badge-success">Procesando</label></td>
                                            <td>$250</td>
                                            <td class="d-none d-sm-table-cell"><a href="#" class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>035</td>
                                            <td class="d-none d-sm-table-cell">Roberto</td>
                                            <td class="d-none d-sm-table-cell">Efectivo</td>
                                            <td><label class="badge badge-warning">Enviando</label></td>
                                            <td>$150</td>
                                            <td class="d-none d-sm-table-cell"><a href="#" class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                         <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Pedro</td>
                                            <td class="d-none d-sm-table-cell">Transferencia</td>
                                            <td><label class="badge badge-success">Procesando</label></td>
                                            <td>$345</td>
                                            <td class="d-none d-sm-table-cell"><a href="#" class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                         <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Anastasia</td>
                                            <td class="d-none d-sm-table-cell">Exterior</td>
                                            <td><label class="badge badge-primary">Completada</label></td>
                                            <td>$2150</td>
                                            <td class="d-none d-sm-table-cell"><a href="#" class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Anastasia</td>
                                            <td class="d-none d-sm-table-cell">Exterior</td>
                                            <td><label class="badge badge-light">Cancelada</label></td>
                                            <td>$2150</td>
                                            <td class="d-none d-sm-table-cell"><a href="#" class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
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


        </div>
        <!-- Page end  -->
    </div>
@endsection
