<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $municipality?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="province_id" class="form-label">{{ __('Province Id') }}</label>
            <input type="text" name="province_id" class="form-control @error('province_id') is-invalid @enderror" value="{{ old('province_id', $municipality?->province_id) }}" id="province_id" placeholder="Province Id">
            {!! $errors->first('province_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label>
                    <input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        class="form-control @error('is_activated') is-invalid @enderror"
                        value="1" {{ old('is_activated', $municipality?->is_activated) ? 'checked' : '' }}>
                    Activado
                </label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
