@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Aplicaciones') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('hxxi.aplicaciones.index') }}">Volver</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h3>{{ __('Editar') }}</h3></div>
                    <br/>

                    <div class="card">
                    <!-- div class="card-header"><h3>{{ __('Editar') }}</h3></div>
                        <br/ -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('hxxi.aplicaciones.update', $hxxi_aplicacion) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <div class="col-md-6">
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                               value="{{ $hxxi_aplicacion->Nombre }}" required autofocus>
                                        @error('nombre')  @include('includes.msj_campo') @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
