<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label>
                    <input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        class="form-control @error('is_activated') is-invalid @enderror"
                        value="1" {{ old('is_activated', $owner?->is_activated) ? 'checked' : '' }}>
                    Activado
                </label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_id" class="form-label">{{ __('Person Id') }}</label>
            <input type="text" name="person_id" class="form-control @error('person_id') is-invalid @enderror" value="{{ old('person_id', $owner?->person_id) }}" id="person_id" placeholder="Person Id">
            {!! $errors->first('person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_statuses_message" class="form-label">{{ __('Person Statuses Message') }}</label>
            <input type="text" name="person_statuses_message" class="form-control @error('person_statuses_message') is-invalid @enderror" value="{{ old('person_statuses_message', $owner?->person_statuses_message) }}" id="person_statuses_message" placeholder="Person Statuses Message">
            {!! $errors->first('person_statuses_message', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
