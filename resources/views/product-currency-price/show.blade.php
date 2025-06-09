@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $productCurrencyPrice->name ?? __('Show') . " " . __('Product Currency Price') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Currency Price</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('product-currency-prices.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Product Id:</strong>
                                    {{ $productCurrencyPrice->product_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Currency Id:</strong>
                                    {{ $productCurrencyPrice->currency_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Purchase Price:</strong>
                                    {{ $productCurrencyPrice->purchase_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sale Price:</strong>
                                    {{ $productCurrencyPrice->sale_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discount Price:</strong>
                                    {{ $productCurrencyPrice->discount_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Price Type:</strong>
                                    {{ $productCurrencyPrice->price_type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Effective Date:</strong>
                                    {{ $productCurrencyPrice->effective_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Expiration Date:</strong>
                                    {{ $productCurrencyPrice->expiration_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Profit Margin Percentage:</strong>
                                    {{ $productCurrencyPrice->profit_margin_percentage }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Profit Amount:</strong>
                                    {{ $productCurrencyPrice->profit_amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Profit Value:</strong>
                                    {{ $productCurrencyPrice->profit_value }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Account Income:</strong>
                                    {{ $productCurrencyPrice->account_income }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Account Cost:</strong>
                                    {{ $productCurrencyPrice->account_cost }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Account Tax:</strong>
                                    {{ $productCurrencyPrice->account_tax }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tax Rate:</strong>
                                    {{ $productCurrencyPrice->tax_rate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tax Account:</strong>
                                    {{ $productCurrencyPrice->tax_account }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Price Category:</strong>
                                    {{ $productCurrencyPrice->price_category }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Concept:</strong>
                                    {{ $productCurrencyPrice->concept }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Exchange Rate:</strong>
                                    {{ $productCurrencyPrice->exchange_rate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Notes:</strong>
                                    {{ $productCurrencyPrice->notes }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
