@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Mostrar'),
                                   "ruta"    => 'hxxi.textos.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ID:</strong>             {{ $hxxi_texto->id }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Descripción:</strong>    {{ $hxxi_texto->descripcion }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>División:</strong>       {{ $hxxi_texto->division }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Subdivisión:</strong>    {{ $hxxi_texto->subdivision }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Creado:</strong>         {{ $hxxi_texto->created_at }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Modificado:</strong>     {{ $hxxi_texto->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
