@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Idiomas') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nuevo Idioma'),
                                   "ruta"    => 'hxxi.idiomas.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.idiomas.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="" required autofocus>
                                    @error('nombre')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ansi" class="col-md-4 col-form-label text-md-right">{{ __('ANSI') }}</label>
                                <div class="col-md-6">
                                    <input id="ansi" type="text" class="form-control @error('ansi') is-invalid @enderror" name="ansi" value="" required >
                                    @error('ansi')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="idioma" class="col-md-4 col-form-label text-md-right">{{ __('Idioma') }}</label>
                                <div class="col-md-6">
                                    <input id="idioma" type="text" class="form-control @error('idioma') is-invalid @enderror" name="idioma" value="" required >
                                    @error('nombre')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pais" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                                <div class="col-md-6">
                                    <input id="pais" type="text" class="form-control @error('pais') is-invalid @enderror" name="pais" value="" required >
                                    @error('pais')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('btn_Guardar') }}</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
