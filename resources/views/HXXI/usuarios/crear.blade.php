@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Usuarios') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nuevo Usuario'),
                                   "ruta"    => 'hxxi.usuarios.index');
                ?>
                @include('includes.cab_opciones')
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.usuarios.create') }}" enctype="multipart/form-data">
                            @csrf
                            @include('includes.campo_editar', ['label'=> 'id_aplicacion', 'id'=>'id_aplicacion',                     'nombre'=>'id_aplicacion',  'requerido'=>'required', 'autofocus'=>'autofocus'])
                            @include('includes.campo_editar', ['label'=> 'id_user_jefe',  'id'=>'id_user_jefe',                      'nombre'=>'id_user_jefe',   'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'id_empresa',    'id'=>'id_empresa',                        'nombre'=>'id_empresa',     'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'role',          'id'=>'role',                              'nombre'=>'role',           'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'nombre',        'id'=>'nombre',                            'nombre'=>'nombre',         'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'apellidos',     'id'=>'apellidos',                         'nombre'=>'apellidos',      'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'nick',          'id'=>'nick',                              'nombre'=>'nick',           'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'email',         'id'=>'email',                             'nombre'=>'email',          'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'password',      'id'=>'password',      'tipo'=>'password', 'nombre'=>'password',       'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'imagen',        'id'=>'imagen',                            'nombre'=>'imagen'])

                            <button type="submit" class="btn btn-primary">{{ __('btn_Guardar') }}</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
