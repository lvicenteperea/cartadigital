@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Menus') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nueva aplicación'),
                    "ruta"    => 'hxxi.menus.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.menus.update', ['hxxi_menu' => $hxxi_menu]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="id_aplicacion" class="col-md-4 col-form-label text-md-right">{{ __('id_aplicacion') }}</label>
                                <div class="col-md-6">
                                    <input id="id_aplicacion" type="text" class="form-control @error('id_aplicacion') is-invalid @enderror" name="id_aplicacion" value="{{ $hxxi_menu->id_aplicacion }}" required autofocus>
                                    @error('id_aplicacion')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_menu" class="col-md-4 col-form-label text-md-right">{{ __('id_menu') }}</label>
                                <div class="col-md-6">
                                    <input id="id_menu" type="text" class="form-control @error('id_menu') is-invalid @enderror" name="id_menu" value="{{ $hxxi_menu->id_menu }}" required >
                                    @error('id_menu')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tooltip" class="col-md-4 col-form-label text-md-right">{{ __('tooltip') }}</label>
                                <div class="col-md-6">
                                    <input id="tooltip" type="text" class="form-control @error('tooltip') is-invalid @enderror" name="tooltip" value="{{ $hxxi_menu->tooltip }}" required >
                                    @error('tooltip')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="label" class="col-md-4 col-form-label text-md-right">{{ __('label') }}</label>
                                <div class="col-md-6">
                                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ $hxxi_menu->label }}" required >
                                    @error('label')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="orden" class="col-md-4 col-form-label text-md-right">{{ __('orden') }}</label>
                                <div class="col-md-6">
                                    <input id="orden" type="text" class="form-control @error('orden') is-invalid @enderror" name="orden" value="{{ $hxxi_menu->orden }}" required >
                                    @error('orden')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            @include('includes.campo_editar', ['label'=> 'link',          'id'=>'link',            'tipo'=>'text', 'nombre'=>'link',
                                                               'valor'=>$hxxi_menu->link, 'requerido'=>'required', 'autofocus'=>''
                                    ])
                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('link') }}</label>
                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $hxxi_menu->link }}" required >
                                    @error('link')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('role') }}</label>
                                <div class="col-md-6">
                                    <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $hxxi_menu->role }}" required>
                                    @error('role')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="icono" class="col-md-4 col-form-label text-md-right">{{ __('icono') }}</label>
                                <div class="col-md-6">
                                    <input id="icono" type="text" class="form-control @error('icono') is-invalid @enderror" name="icono" value="{{ $hxxi_menu->icono }}" required>
                                    @error('icono')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="©" class="col-md-4 col-form-label text-md-right">{{ __('desde') }}</label>
                                <div class="col-md-6">
                                    <input id="desde" type="date" class="form-control @error('desde') is-invalid @enderror" name="desde" value="{{ $hxxi_menu->desde }}" required >
                                    @error('desde')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>

                            @include('includes.campo_editar', ['label'=> 'hasta',
                                'id'=>'hasta',
                                'tipo'=>'date',
                                'nombre'=>'hasta',
                                'valor'=>'{{ $hxxi_menu->hasta }}',
                                'requerido'=>'required',
                                'autofocus'=>''
                                       ])
                            <div class="form-group row">
                                <label for="hasta" class="col-md-4 col-form-label text-md-right">{{ __('hasta') }}</label>
                                <div class="col-md-6">
                                    <input id="hasta" type="date" class="form-control @error('hasta') is-invalid @enderror" name="hasta" value="{{ $hxxi_menu->hasta }}" required>
                                    @error('hasta')  @include('includes.msj_campo') @enderror
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
