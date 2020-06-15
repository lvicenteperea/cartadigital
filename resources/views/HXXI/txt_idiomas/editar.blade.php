@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos Idiomas') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Editar'),
                                   "ruta"    => 'hxxi.txt_idiomas.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.txt_idiomas.update', ['hxxi_texto_idioma' => $hxxi_texto_idioma]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="id_texto" class="col-md-4 col-form-label text-md-right">{{ __('id_texto') }}</label>
                                <div class="col-md-6">
                                    <input id="id_texto" type="text" class="form-control @error('id_texto') is-invalid @enderror" name="id_texto"
                                           value="{{ $hxxi_texto_idioma->id_texto }}" required autofocus>
                                    @error('id_texto')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_idioma" class="col-md-4 col-form-label text-md-right">{{ __('id_idioma') }}</label>
                                <div class="col-md-6">
                                    <input id="id_idioma" type="text" class="form-control @error('id_idioma') is-invalid @enderror" name="id_idioma"
                                           value="{{ $hxxi_texto_idioma->id_idioma }}" required>
                                    @error('id_idioma')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="texto" class="col-md-4 col-form-label text-md-right">{{ __('texto') }}</label>
                                <div class="col-md-6">
                                    <input id="texto" type="text" class="form-control @error('texto') is-invalid @enderror" name="texto"
                                           value="{{ $hxxi_texto_idioma->texto }}" required>
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
@endsection
