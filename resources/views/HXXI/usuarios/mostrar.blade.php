@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Usuarios') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Mostrar'),
                                   "ruta"    => 'hxxi.usuarios.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="row">

                        @include('includes.campo_ver', ['label'=> 'id_aplicacion', 'valor'=>$hxxi_usuario->id_aplicacion])
                        @include('includes.campo_ver', ['label'=> 'id_user_jefe',  'valor'=>$hxxi_usuario->id_user_jefe])
                        @include('includes.campo_ver', ['label'=> 'id_empresa',    'valor'=>$hxxi_usuario->id_empresa])
                        @include('includes.campo_ver', ['label'=> 'role',          'valor'=>$hxxi_usuario->role])
                        @include('includes.campo_ver', ['label'=> 'nombre',        'valor'=>$hxxi_usuario->nombre])
                        @include('includes.campo_ver', ['label'=> 'apellidos',     'valor'=>$hxxi_usuario->apellidos])
                        @include('includes.campo_ver', ['label'=> 'nick',          'valor'=>$hxxi_usuario->nick])
                        @include('includes.campo_ver', ['label'=> 'email',         'valor'=>$hxxi_usuario->email])
                        @include('includes.campo_ver', ['label'=> 'password',      'valor'=>$hxxi_usuario->password])
                        @include('includes.campo_ver', ['label'=> 'imagen',        'valor'=>$hxxi_usuario->imagen])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
