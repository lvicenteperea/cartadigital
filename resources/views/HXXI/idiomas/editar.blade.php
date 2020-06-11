@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Idiomas') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('hxxi.idiomas.index') }}">Volver</a>
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
                            <form method="POST" action="{{ route('hxxi.idiomas.update', ['hxxi_idioma' => $Hxxi_Idioma]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <div class="col-md-6">
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                               value="{{ $Hxxi_Idioma->nombre }}" required autofocus>
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-danger">{{$errors->first('nombre')}}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ansi" class="col-md-4 col-form-label text-md-right">{{ __('Ansi') }}</label>
                                    <div class="col-md-6">
                                        <input id="ansi" type="text" class="form-control @error('ansi') is-invalid @enderror" name="ansi"
                                               value="{{ $Hxxi_Idioma->ansi }}" required >
                                        @error('ansi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-danger">{{$errors->first('ansi')}}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idioma" class="col-md-4 col-form-label text-md-right">{{ __('Idioma') }}</label>
                                    <div class="col-md-6">
                                        <input id="idioma" type="text" class="form-control @error('idioma') is-invalid @enderror" name="idioma"
                                               value="{{ $Hxxi_Idioma->idioma }}" required autofocus>
                                        @error('idioma')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-danger">{{$errors->first('idioma')}}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pais" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                                    <div class="col-md-6">
                                        <input id="pais" type="text" class="form-control @error('pais') is-invalid @enderror" name="pais"
                                               value="{{ $Hxxi_Idioma->pais }}" required>
                                        @error('pais')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-danger">{{$errors->first('pais')}}</div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
