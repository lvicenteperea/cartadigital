@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos Idiomas') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Mostrar'),
                                   "ruta"    => 'hxxi.txt_idiomas.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ID:</strong>        {{ $hxxi_texto_idioma->id }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>id_texto:</strong>  {{ $hxxi_texto_idioma->id_texto }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>id_idioma:</strong> {{ $hxxi_texto_idioma->id_idioma }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Texto:</strong>     {{ $hxxi_texto_idioma->texto }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Creado:</strong>    {{ $hxxi_texto_idioma->created_at }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Modificado:</strong>{{ $hxxi_texto_idioma->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
