@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos Idiomas') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('hxxi.txt_idiomas.index') }}">Volver</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h3>{{ __('Crear nuevo Texto Idioma') }}</h3></div>
                    <br/>

                    <div class="card">
                    <!-- div class="card-header"><h3>{ { __('Nuevo Texto') }}</h3></div>
                        <br/ -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('hxxi.txt_idiomas.create') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="id_texto" class="col-md-4 col-form-label text-md-right">{{ __('id_texto') }}</label>
                                    <div class="col-md-6">
                                        <input id="id_texto" type="text" class="form-control @error('id_texto') is-invalid @enderror" name="id_texto" value="" required autofocus>
                                        @error('id_texto')  @include('includes.msj_campo') @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="id_idioma" class="col-md-4 col-form-label text-md-right">{{ __('id_idioma') }}</label>
                                    <div class="col-md-6">
                                        <input id="id_idioma" type="text" class="form-control @error('id_idioma') is-invalid @enderror" name="id_idioma" value="" required >
                                        @error('id_idioma')  @include('includes.msj_campo') @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="texto" class="col-md-4 col-form-label text-md-right">{{ __('texto') }}</label>
                                    <div class="col-md-6">
                                        <input id="texto" type="text" class="form-control @error('texto') is-invalid @enderror" name="texto" value="" required >
                                        @error('texto')  @include('includes.msj_campo') @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('btn_Guardar') }}</button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
