<div class="row padding-1 p-1">


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nombre <span style="color: #FF9770 !important;">*</span></label>
                <input id="name" name="name" type="text" class="form-control"
                    placeholder="El nombre de la categoría obligatorio" required
                    value="{{ old('name', $productCategory?->name) }}">
                <div class="help-block with-errors"></div>
            </div>
        </div>
         <div class="col-md-12">

            <div class="form-group">
                <label>Categoría Superior:</label>
                <select id="category_parent_name" name="category_parent_name" class="form-control">
                    <option value="" >Ninguna</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['name']}}">
                            {{ $category['name'] }}</option>
                    @endforeach

                </select>
   <small style="margin-top:50px;    color: #838689;">Las categorías, a diferencia de las etiquetas, pueden tener jerarquías. Podrías tener una categoría de Alimentos y, por debajo, las categorías Confituras y Cárnicos. Totalmente opcional.</small>
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Descripción</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $productCategory?->description) }}</textarea>

            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <div class="crm-profile-img-edit position-relative">
                    <img class="crm-profile-pic rounded avatar-100"
                        src="{{ old('path_image', asset($productCategory->path_image ?? 'img/upload/no-picture.jpg')) }}"
                        alt="profile-pic" id="image-preview">
                    <div class="crm-p-image bg-primary">
                        <i class="las la-pen upload-button"></i>
                        <input id="path_image" name="path_image" class="file-upload" type="file" accept="image/*"
                            value=" {{ old('path_image', $productCategory?->path_image) }}">
                    </div>
                </div>
                <div class="img-extension mt-3">
                    <div class="d-inline-block align-items-center">
                        <span>Solo</span>
                        <span class="text-secondary">.jpg /</span>
                        <span class="text-secondary">.png /</span>
                        <span class="text-secondary">.jpeg /</span>
                        <span class="text-secondary">.webp /</span>
                        <span>Permitido</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label>
                    <input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        class="form-control @error('is_activated') is-invalid @enderror"
                        value="1" {{ old('is_activated', $productCategory?->is_activated) ? 'checked' : '' }}>
                    Activado
                </label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <input type="hidden" id="currencyArray" name="currencyArray" value="" required>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
