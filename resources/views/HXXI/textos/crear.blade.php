@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nuevo Texto'),
                                   "ruta"    => 'hxxi.textos.index');
                ?>
                @include('includes.cab_opciones')
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.textos.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                                <div class="col-md-6">
                                    <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="" required autofocus>
                                    @error('descripcion')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('División') }}</label>
                                <div class="col-md-6">
                                    <select id="division" name="division" class="form-control">
                                        <option value="WEB">Texto de webs</option>
                                        <option value="TABLAS">Texto de una tabla</option>
                                        <option value="OTROS">Otros textos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subdivision" class="col-md-4 col-form-label text-md-right">{{ __('SubDivisión') }}</label>
                                <div class="col-md-6">
                                    <input id="subdivision" type="text" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision" value="" required >
                                    @error('subdivision')  @include('includes.msj_campo') @enderror
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
