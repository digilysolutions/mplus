<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="product_id" class="form-label">{{ __('Product Id') }}</label>
            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id', $productCurrencyPrice?->product_id) }}" id="product_id" placeholder="Product Id">
            {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="currency_id" class="form-label">{{ __('Currency Id') }}</label>
            <input type="text" name="currency_id" class="form-control @error('currency_id') is-invalid @enderror" value="{{ old('currency_id', $productCurrencyPrice?->currency_id) }}" id="currency_id" placeholder="Currency Id">
            {!! $errors->first('currency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purchase_price" class="form-label">{{ __('Purchase Price') }}</label>
            <input type="text" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price', $productCurrencyPrice?->purchase_price) }}" id="purchase_price" placeholder="Purchase Price">
            {!! $errors->first('purchase_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sale_price" class="form-label">{{ __('Sale Price') }}</label>
            <input type="text" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price', $productCurrencyPrice?->sale_price) }}" id="sale_price" placeholder="Sale Price">
            {!! $errors->first('sale_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discount_price" class="form-label">{{ __('Discount Price') }}</label>
            <input type="text" name="discount_price" class="form-control @error('discount_price') is-invalid @enderror" value="{{ old('discount_price', $productCurrencyPrice?->discount_price) }}" id="discount_price" placeholder="Discount Price">
            {!! $errors->first('discount_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price_type" class="form-label">{{ __('Price Type') }}</label>
            <input type="text" name="price_type" class="form-control @error('price_type') is-invalid @enderror" value="{{ old('price_type', $productCurrencyPrice?->price_type) }}" id="price_type" placeholder="Price Type">
            {!! $errors->first('price_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="effective_date" class="form-label">{{ __('Effective Date') }}</label>
            <input type="text" name="effective_date" class="form-control @error('effective_date') is-invalid @enderror" value="{{ old('effective_date', $productCurrencyPrice?->effective_date) }}" id="effective_date" placeholder="Effective Date">
            {!! $errors->first('effective_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="expiration_date" class="form-label">{{ __('Expiration Date') }}</label>
            <input type="text" name="expiration_date" class="form-control @error('expiration_date') is-invalid @enderror" value="{{ old('expiration_date', $productCurrencyPrice?->expiration_date) }}" id="expiration_date" placeholder="Expiration Date">
            {!! $errors->first('expiration_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="profit_margin_percentage" class="form-label">{{ __('Profit Margin Percentage') }}</label>
            <input type="text" name="profit_margin_percentage" class="form-control @error('profit_margin_percentage') is-invalid @enderror" value="{{ old('profit_margin_percentage', $productCurrencyPrice?->profit_margin_percentage) }}" id="profit_margin_percentage" placeholder="Profit Margin Percentage">
            {!! $errors->first('profit_margin_percentage', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="profit_amount" class="form-label">{{ __('Profit Amount') }}</label>
            <input type="text" name="profit_amount" class="form-control @error('profit_amount') is-invalid @enderror" value="{{ old('profit_amount', $productCurrencyPrice?->profit_amount) }}" id="profit_amount" placeholder="Profit Amount">
            {!! $errors->first('profit_amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="profit_value" class="form-label">{{ __('Profit Value') }}</label>
            <input type="text" name="profit_value" class="form-control @error('profit_value') is-invalid @enderror" value="{{ old('profit_value', $productCurrencyPrice?->profit_value) }}" id="profit_value" placeholder="Profit Value">
            {!! $errors->first('profit_value', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="account_income" class="form-label">{{ __('Account Income') }}</label>
            <input type="text" name="account_income" class="form-control @error('account_income') is-invalid @enderror" value="{{ old('account_income', $productCurrencyPrice?->account_income) }}" id="account_income" placeholder="Account Income">
            {!! $errors->first('account_income', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="account_cost" class="form-label">{{ __('Account Cost') }}</label>
            <input type="text" name="account_cost" class="form-control @error('account_cost') is-invalid @enderror" value="{{ old('account_cost', $productCurrencyPrice?->account_cost) }}" id="account_cost" placeholder="Account Cost">
            {!! $errors->first('account_cost', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="account_tax" class="form-label">{{ __('Account Tax') }}</label>
            <input type="text" name="account_tax" class="form-control @error('account_tax') is-invalid @enderror" value="{{ old('account_tax', $productCurrencyPrice?->account_tax) }}" id="account_tax" placeholder="Account Tax">
            {!! $errors->first('account_tax', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tax_rate" class="form-label">{{ __('Tax Rate') }}</label>
            <input type="text" name="tax_rate" class="form-control @error('tax_rate') is-invalid @enderror" value="{{ old('tax_rate', $productCurrencyPrice?->tax_rate) }}" id="tax_rate" placeholder="Tax Rate">
            {!! $errors->first('tax_rate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tax_account" class="form-label">{{ __('Tax Account') }}</label>
            <input type="text" name="tax_account" class="form-control @error('tax_account') is-invalid @enderror" value="{{ old('tax_account', $productCurrencyPrice?->tax_account) }}" id="tax_account" placeholder="Tax Account">
            {!! $errors->first('tax_account', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price_category" class="form-label">{{ __('Price Category') }}</label>
            <input type="text" name="price_category" class="form-control @error('price_category') is-invalid @enderror" value="{{ old('price_category', $productCurrencyPrice?->price_category) }}" id="price_category" placeholder="Price Category">
            {!! $errors->first('price_category', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="concept" class="form-label">{{ __('Concept') }}</label>
            <input type="text" name="concept" class="form-control @error('concept') is-invalid @enderror" value="{{ old('concept', $productCurrencyPrice?->concept) }}" id="concept" placeholder="Concept">
            {!! $errors->first('concept', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="exchange_rate" class="form-label">{{ __('Exchange Rate') }}</label>
            <input type="text" name="exchange_rate" class="form-control @error('exchange_rate') is-invalid @enderror" value="{{ old('exchange_rate', $productCurrencyPrice?->exchange_rate) }}" id="exchange_rate" placeholder="Exchange Rate">
            {!! $errors->first('exchange_rate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="notes" class="form-label">{{ __('Notes') }}</label>
            <input type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{ old('notes', $productCurrencyPrice?->notes) }}" id="notes" placeholder="Notes">
            {!! $errors->first('notes', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
