@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Usuarios') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nuevo usuario'),
                    "ruta"    => 'hxxi.usuarios.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.usuarios.update', ['hxxi_usuario' => $hxxi_usuario]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('includes.campo_editar', ['label'=> 'id_aplicacion', 'id'=>'id_aplicacion', 'nombre'=>'id_aplicacion', 'valor'=>$hxxi_usuario->id_aplicacion, 'requerido'=>'required', 'autofocus'=>'autofocus'])
                            @include('includes.campo_editar', ['label'=> 'id_user_jefe',  'id'=>'id_user_jefe',  'nombre'=>'id_user_jefe',  'valor'=>$hxxi_usuario->id_user_jefe, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'id_empresa',    'id'=>'id_empresa',    'nombre'=>'id_empresa',    'valor'=>$hxxi_usuario->id_empresa, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'role',          'id'=>'role',          'nombre'=>'role',          'valor'=>$hxxi_usuario->role, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'nombre',        'id'=>'nombre',        'nombre'=>'nombre',        'valor'=>$hxxi_usuario->nombre, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'apellidos',     'id'=>'apellidos',     'nombre'=>'apellidos',     'valor'=>$hxxi_usuario->apellidos, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'nick',          'id'=>'nick',          'nombre'=>'nick',          'valor'=>$hxxi_usuario->nick, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'email',         'id'=>'email',         'nombre'=>'email',         'valor'=>$hxxi_usuario->email, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'password',      'id'=>'password',      'nombre'=>'password',      'valor'=>$hxxi_usuario->password, 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'imagen',        'id'=>'imagen',        'nombre'=>'imagen',        'valor'=>$hxxi_usuario->imagen, 'requerido'=>'required'])

                            <button type="submit" class="btn btn-primary">{{ __('btn_Guardar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
