@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Dispositivos') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nuevo Dispositivo'),
                    "ruta"    => 'hxxi.dispositivos.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.dispositivos.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="" required autofocus>
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="text-danger">{{$message}}</div>
                                    </span>
                                    @enderror
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
