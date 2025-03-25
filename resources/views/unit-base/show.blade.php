@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $unitBase->name ?? __('Show') . " " . __('Unit Base') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} {{__('Unit Base')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('unit-bases.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                     @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif<div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('Name')}}:</strong>
                                    {{ $unitBase->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('is_activated')}}:</strong>
                                    @if ($unitBase->is_activated == 1)
                                    Si
                                @else
                                    No
                                @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
