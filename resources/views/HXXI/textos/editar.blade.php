@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('hxxi.textos.index') }}">Volver</a>
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
                            <form method="POST" action="{{ route('hxxi.textos.update', ['hxxi_texto' => $hxxi_texto]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                                    <div class="col-md-6">
                                        <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                               value="{{ $hxxi_texto->descripcion }}" required autofocus>
                                        @error('descripcion')  @include('includes.msj_campo') @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('División') }}</label>
                                    <div class="col-md-6">
                                        <!-- input id="division" type="text" class="form-control @ error('division') is-invalid @ enderror" name="division"
                                               value="{{ $hxxi_texto->division }}" required -->
                                        <select id="division" name="division" class="form-control">
                                            <option value="WEB"    @if($hxxi_texto->division == 'WEB') selected @endif>Texto de webs</option>
                                            <option value="TABLAS" @if($hxxi_texto->division == 'TABLAS') selected @endif>Texto de una tabla</option>
                                            <option value="OTROS"  @if($hxxi_texto->division == 'OTROS') selected @endif>Otros textos</option>
                                        </select>
                                        <!-- @ error('division')  @ include('includes.msj_campo') @ enderror -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subdivision" class="col-md-4 col-form-label text-md-right">{{ __('SubDivisión') }}</label>
                                    <div class="col-md-6">
                                        <input id="subdivision" type="text" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision"
                                               value="{{ $hxxi_texto->subdivision }}" required>
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
    </div>
@endsection
