<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $discountsByExpirationDate?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label>
                    <input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        class="form-control @error('is_activated') is-invalid @enderror"
                        value="1" {{ old('is_activated', $discountsByExpirationDate?->is_activated) ? 'checked' : '' }}>
                    Activado
                </label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discount_type" class="form-label">{{ __('Discount Type') }}</label>
            <input type="text" name="discount_type" class="form-control @error('discount_type') is-invalid @enderror" value="{{ old('discount_type', $discountsByExpirationDate?->discount_type) }}" id="discount_type" placeholder="Discount Type">
            {!! $errors->first('discount_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discount_amount" class="form-label">{{ __('Discount Amount') }}</label>
            <input type="text" name="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" value="{{ old('discount_amount', $discountsByExpirationDate?->discount_amount) }}" id="discount_amount" placeholder="Discount Amount">
            {!! $errors->first('discount_amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="start_date" class="form-label">{{ __('Start Date') }}</label>
            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $discountsByExpirationDate?->start_date) }}" id="start_date" placeholder="Start Date">
            {!! $errors->first('start_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="end_date" class="form-label">{{ __('End Date') }}</label>
            <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $discountsByExpirationDate?->end_date) }}" id="end_date" placeholder="End Date">
            {!! $errors->first('end_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
