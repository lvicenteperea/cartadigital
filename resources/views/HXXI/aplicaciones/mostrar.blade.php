@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Aplicaciones') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Mostrar'),
                                   "ruta"    => 'hxxi.aplicaciones.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ID:</strong>
                                {{ $hxxi_aplicacion->id }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $hxxi_aplicacion->Nombre }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Creado:</strong>
                                {{ $hxxi_aplicacion->created_at }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Modificado:</strong>
                                {{ $hxxi_aplicacion->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
