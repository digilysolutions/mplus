@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Update') }} Product Currency Price
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Product Currency Price</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('product-currency-prices.index') }}"> {{ __('') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('product-currency-prices.update', $productCurrencyPrice->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('product-currency-price.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
