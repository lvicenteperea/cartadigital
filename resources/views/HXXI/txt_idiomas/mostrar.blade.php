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
                    <div class="card-header"><h3>{{ __('Mostrar') }}</h3></div>
                    <br/>

                    <div class="card">
                        <!-- div class="card-header"><h3>{ { __('Mostrar') }}</h3></div>
                        <br/ -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ID:</strong>
                                    {{ $hxxi_texto_idioma->id }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>id_texto:</strong>
                                    {{ $hxxi_texto_idioma->id_texto }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>id_idioma:</strong>
                                    {{ $hxxi_texto_idioma->id_idioma }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Texto:</strong>
                                    {{ $hxxi_texto_idioma->texto }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Creado:</strong>
                                    {{ $hxxi_texto_idioma->created_at }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Modificado:</strong>
                                    {{ $hxxi_texto_idioma->updated_at }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
