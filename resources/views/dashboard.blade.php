@extends('layouts.app-admin')
@section('title-header-admin')
    RPG Solutions
@endsection
@section('css')
    <style>
        .fixed-size-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            /* para mantener la proporción y no distorsionar */
        }
    </style>
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
                                        <div class="rounded">
                                            <img src="{{ asset('img/upload/Impresora Epson l3250 wifi escáner.jpg') }}"
                                                class="style-img img-fluid m-auto p-3 fixed-size-img" alt="image">

                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Impresora láser</h5>
                                            <p class="mb-0">$789</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="rounded">
                                            <img src="{{ asset('img/upload/Olla de presión de inducción.jpg') }}"
                                                class="style-img img-fluid m-auto p-3 fixed-size-img" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Olla de presión</h5>
                                            <p class="mb-0">$657</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="rounded">
                                            <img src="{{ asset('img/upload/Lavadora semiautomática de 7Kg marca Milexus..jpg') }}"
                                                class="style-img img-fluid m-auto p-3 fixed-size-img" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Lavadora semiautomática</h5>
                                            <p class="mb-0">$489</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3">
                                <div class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="rounded">
                                            <img src="{{ asset('img/upload/Impresora láser monocromática canon.jpg') }}"
                                                class="style-img img-fluid m-auto p-3 fixed-size-img" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">Impresora láser </h5>
                                            <p class="mb-0">$468</p>
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
                            <div class="rounded">
                                <img src="{{ asset('img/upload/Impresora láser monocromática canon.jpg') }}" class="style-img img-fluid m-auto fixed-size-img"
                                    alt="image">
                            </div>
                            <div class="style-text text-left">
                                <h5 class="mb-2">Impresora láser</h5>
                                <p class="mb-2">Total de Ventas : 45897</p>
                                <p class="mb-0">Total Ganado : $45,89 M</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height-helf">
                    <div class="card-body card-item-right">
                        <div class="d-flex align-items-top">
                            <div class=" rounded">
                                <img src="{{ asset('img/upload/Olla de presión de inducción.jpg') }}" class="style-img img-fluid m-auto fixed-size-img"
                                    alt="image">
                            </div>
                            <div class="style-text text-left">
                                <h5 class="mb-2">Olla de presión</h5>
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
                            <h5 class="card-title">Últimas órdenes modificadas </h5>
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
                                            <td class="d-none d-sm-table-cell"><a href="#"
                                                    class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>035</td>
                                            <td class="d-none d-sm-table-cell">Roberto</td>
                                            <td class="d-none d-sm-table-cell">Efectivo</td>
                                            <td><label class="badge badge-warning">Enviando</label></td>
                                            <td>$150</td>
                                            <td class="d-none d-sm-table-cell"><a href="#"
                                                    class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Pedro</td>
                                            <td class="d-none d-sm-table-cell">Transferencia</td>
                                            <td><label class="badge badge-success">Procesando</label></td>
                                            <td>$345</td>
                                            <td class="d-none d-sm-table-cell"><a href="#"
                                                    class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Anastasia</td>
                                            <td class="d-none d-sm-table-cell">Exterior</td>
                                            <td><label class="badge badge-primary">Completada</label></td>
                                            <td>$2150</td>
                                            <td class="d-none d-sm-table-cell"><a href="#"
                                                    class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>034</td>
                                            <td class="d-none d-sm-table-cell">Anastasia</td>
                                            <td class="d-none d-sm-table-cell">Exterior</td>
                                            <td><label class="badge badge-light">Cancelada</label></td>
                                            <td>$2150</td>
                                            <td class="d-none d-sm-table-cell"><a href="#"
                                                    class="btn btn-outline-success btn-sm">Ver Orden</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Productos y Ventas</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="high-pie-chart" data-highcharts-chart="3" style="overflow: hidden;"><div id="highcharts-7k6xbs9-48" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 412px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="412" height="400" viewBox="0 0 412 400"><desc>Created with Highcharts 8.0.0</desc><defs><clipPath id="highcharts-7k6xbs9-54-"><rect x="0" y="0" width="392" height="317" fill="none"></rect></clipPath></defs><rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="412" height="400" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="10" y="68" width="392" height="317"></rect><g class="highcharts-pane-group" data-z-index="0"></g><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="10" y="68" width="392" height="317"></rect><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker" transform="translate(10,68) scale(1 1)" style="cursor:pointer;"><path fill="#65f9b3" d="M 191.44626285969852 138.6628304622576 A 114 114 0 0 1 244.70658163941033 75.03159847050972 L 245.18722566011724 75.90851427339999 A 113 113 0 0 0 192.39410265917485 138.9815775634659 Z" class="highcharts-halo highcharts-color-2" data-z-index="-1" fill-opacity="0.25" visibility="hidden"></path><path fill="#4788ff" d="M 207.4875759345746 103.50000126522463 A 61 61 0 1 1 153.6947190814596 193.2400721167667 L 207.5 164.5 A 0 0 0 1 0 207.5 164.5 Z" transform="translate(9,5)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-point-select highcharts-color-0"></path><path fill="#ff4b4b" d="M 153.66600591677104 193.18625247478084 A 61 61 0 0 1 149.6623575711223 145.1142547662132 L 207.5 164.5 A 0 0 0 0 0 207.5 164.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-1"></path><path fill="#65f9b3" d="M 149.68177223194394 145.05642682629573 A 61 61 0 0 1 178.18071473687746 111.0081360236938 L 207.5 164.5 A 0 0 0 0 0 207.5 164.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-2"></path><path fill="#6ce6f4" d="M 178.23422125157987 110.97884348924697 A 61 61 0 0 1 196.55585239801974 104.4897872586168 L 207.5 164.5 A 0 0 0 0 0 207.5 164.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-3"></path><path fill="#8085e9" d="M 196.6158680728328 104.47887311794273 A 61 61 0 0 1 207.41527222377763 103.50005884261907 L 207.5 164.5 A 0 0 0 0 0 207.5 164.5 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-4"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-pie-series" transform="translate(10,68) scale(1 1)"></g></g><text x="206" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"><tspan>Browser market shares in January,</tspan><tspan dy="21" x="206">2018</tspan></text><text x="206" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="67"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="397"></text><g data-z-index="6" class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-tracker" transform="translate(10,68) scale(1 1)" opacity="1" style="cursor:pointer;"><path fill="none" class="highcharts-data-label-connector highcharts-color-0" stroke="#4788ff" stroke-width="1" d="M 290.5306764739755 211.32107996419737 C 285.5306764739755 211.32107996419737 270.0960371714309 202.05976744380666 264.95115740391606 198.9726632703431 L 259.8062776364012 195.88555909687955"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-1" stroke="#ff4b4b" stroke-width="1" d="M 111.81217236749792 172.03113001465192 C 116.81217236749792 172.03113001465192 134.7504239871137 170.54145594581965 140.7298411936523 170.04489792287558 L 146.70925840019092 169.5483398999315" opacity="1"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-2" stroke="#65f9b3" stroke-width="1" d="M 122.30024835429988 121.50000190734863 C 127.30024835429988 121.50000190734863 151.5357604069876 117.62779195753731 156.13556092148178 121.48030220760273 L 160.73536143597596 125.33281245766815" opacity="1"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-3" stroke="#6ce6f4" stroke-width="1" d="M 141.35885140576667 97.10000038146973 C 146.35885140576667 97.10000038146973 183.154575163047 95.67921615159943 185.15556898526233 101.33571893365975 L 187.15656280747766 106.99222171572006" opacity="1"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-4" stroke="#8085e9" stroke-width="1" d="M 194.3454936938428 73.5 C 199.3454936938428 73.5 200.95847296319255 91.79368374049807 201.49613271964247 97.76954535086809 L 202.0337924760924 103.7454069612381" opacity="1"></path><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(296,201)"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;cursor:pointer;fill:#000000;" y="16"><tspan style="font-weight: bold;" x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">Chrome</tspan><tspan dx="0" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">: 67.2 %</tspan><tspan style="font-weight:bold" x="5" y="16">Chrome</tspan><tspan dx="0">: 67.2 %</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(0,162)" opacity="1"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;cursor:pointer;fill:#000000;" y="16"><tspan style="font-weight:bold" x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">Internet Explorer</tspan><tspan dx="0" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">:</tspan><tspan dy="14" x="5" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">13.0 %</tspan><tspan style="font-weight:bold" x="5" y="16">Internet Explorer</tspan><tspan dx="0">:</tspan><tspan dy="14" x="5">13.0 %</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(26,112)" opacity="1"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;cursor:pointer;fill:#000000;" y="16"><tspan style="font-weight: bold;" x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">Firefox</tspan><tspan dx="0" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">: 11.9 %</tspan><tspan style="font-weight:bold" x="5" y="16">Firefox</tspan><tspan dx="0">: 11.9 %</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-3" data-z-index="1" transform="translate(64,87)" opacity="1"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;cursor:pointer;fill:#000000;" y="16"><tspan style="font-weight: bold;" x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">Edge</tspan><tspan dx="0" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">: 5.1 %</tspan><tspan style="font-weight:bold" x="5" y="16">Edge</tspan><tspan dx="0">: 5.1 %</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-4" data-z-index="1" transform="translate(113,64)" opacity="1"><text x="5" data-z-index="1" style="font-size:11px;font-weight:bold;color:#000000;cursor:pointer;fill:#000000;" y="16"><tspan style="font-weight: bold;" x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">Other</tspan><tspan dx="0" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">: 2.9 %</tspan><tspan style="font-weight:bold" x="5" y="16">Other</tspan><tspan dx="0">: 2.9 %</tspan></text></g></g><g class="highcharts-legend" data-z-index="7"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="8" height="8" visibility="hidden"></rect><g data-z-index="1"><g></g></g></g><text x="402" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="395">Highcharts.com</text><g class="highcharts-label highcharts-tooltip                                                                                                                                                highcharts-color-0" style="pointer-events:none;white-space:nowrap;" data-z-index="8" transform="translate(336,145)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 95.5 0.5 C 98.5 0.5 98.5 0.5 98.5 3.5 L 98.5 41.5 C 98.5 44.5 98.5 44.5 95.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 95.5 0.5 C 98.5 0.5 98.5 0.5 98.5 3.5 L 98.5 41.5 C 98.5 44.5 98.5 44.5 95.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 95.5 0.5 C 98.5 0.5 98.5 0.5 98.5 3.5 L 98.5 41.5 C 98.5 44.5 98.5 44.5 95.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 95.5 0.5 C 98.5 0.5 98.5 0.5 98.5 3.5 L 98.5 41.5 C 98.5 44.5 98.5 44.5 95.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#4788ff" stroke-width="1"></path><text x="8" data-z-index="1" style="font-size:12px;color:#333333;cursor:default;fill:#333333;" y="20"><tspan style="font-size: 10px">Chrome</tspan><tspan x="8" dy="15">Brands: </tspan><tspan style="font-weight:bold" dx="0">67.2%</tspan></text></g></svg></div></div>
                  </div>
               </div>
            </div>
           
            

        </div>
        <!-- Page end  -->
    </div>
@endsection
