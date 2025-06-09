@extends('layouts.app-admin')

@section('title-header-admin')
    Product Currency Prices
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product Currency Prices') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('product-currency-prices.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                           <table id="datatable" class="table data-tables table-striped">
                              <thead>
                                 <tr class="ligth">
                                        <th>No</th>
                                        
									<th >Product Id</th>
									<th >Currency Id</th>
									<th >Purchase Price</th>
									<th >Sale Price</th>
									<th >Discount Price</th>
									<th >Price Type</th>
									<th >Effective Date</th>
									<th >Expiration Date</th>
									<th >Profit Margin Percentage</th>
									<th >Profit Amount</th>
									<th >Profit Value</th>
									<th >Account Income</th>
									<th >Account Cost</th>
									<th >Account Tax</th>
									<th >Tax Rate</th>
									<th >Tax Account</th>
									<th >Price Category</th>
									<th >Concept</th>
									<th >Exchange Rate</th>
									<th >Notes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($productCurrencyPrices as $productCurrencyPrice)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $productCurrencyPrice->product_id }}</td>
										<td >{{ $productCurrencyPrice->currency_id }}</td>
										<td >{{ $productCurrencyPrice->purchase_price }}</td>
										<td >{{ $productCurrencyPrice->sale_price }}</td>
										<td >{{ $productCurrencyPrice->discount_price }}</td>
										<td >{{ $productCurrencyPrice->price_type }}</td>
										<td >{{ $productCurrencyPrice->effective_date }}</td>
										<td >{{ $productCurrencyPrice->expiration_date }}</td>
										<td >{{ $productCurrencyPrice->profit_margin_percentage }}</td>
										<td >{{ $productCurrencyPrice->profit_amount }}</td>
										<td >{{ $productCurrencyPrice->profit_value }}</td>
										<td >{{ $productCurrencyPrice->account_income }}</td>
										<td >{{ $productCurrencyPrice->account_cost }}</td>
										<td >{{ $productCurrencyPrice->account_tax }}</td>
										<td >{{ $productCurrencyPrice->tax_rate }}</td>
										<td >{{ $productCurrencyPrice->tax_account }}</td>
										<td >{{ $productCurrencyPrice->price_category }}</td>
										<td >{{ $productCurrencyPrice->concept }}</td>
										<td >{{ $productCurrencyPrice->exchange_rate }}</td>
										<td >{{ $productCurrencyPrice->notes }}</td>

                                            <td>
                                                <form action="{{ route('product-currency-prices.destroy', $productCurrencyPrice->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('product-currency-prices.show', $productCurrencyPrice->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('product-currency-prices.edit', $productCurrencyPrice->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>
                                  
									<th >Product Id</th>
									<th >Currency Id</th>
									<th >Purchase Price</th>
									<th >Sale Price</th>
									<th >Discount Price</th>
									<th >Price Type</th>
									<th >Effective Date</th>
									<th >Expiration Date</th>
									<th >Profit Margin Percentage</th>
									<th >Profit Amount</th>
									<th >Profit Value</th>
									<th >Account Income</th>
									<th >Account Cost</th>
									<th >Account Tax</th>
									<th >Tax Rate</th>
									<th >Tax Account</th>
									<th >Price Category</th>
									<th >Concept</th>
									<th >Exchange Rate</th>
									<th >Notes</th>

                                   <th></th>
                                 </tr>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
@endsection
