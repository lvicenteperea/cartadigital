@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Usuarios') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Lista'),
                                   "ruta"    => 'hxxi.usuarios.crear',
                                   "btn_ruta" => __('btn_Crear')
                );
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <table class="tabla-crud table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>id_aplicacion</th>
                            <th>Jefe</th>
                            <th>Empresa</th>
                            <th>Role</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Nick</th>
                            <th>Email</th>
                            <th>Imagen</th>
                            <th>creado</th>
                            <th>modificado</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($usuarios as $usuario)
                            <?php
                                /*--- Parametros para los includes ---*/
                                $crud = array("ruta" => "hxxi.usuarios",
                                              "item" => $usuario,
                                );
                                $modal = array("id"       => $usuario->id,
                                               "cabecera" => 'Confirmación de borrado',
                                               "menu"     => '¿Seguro que quieres borrar "'. $usuario->label .'"?',
                                               "boton1"   => 'Cancelar',
                                               "boton2"   => 'Confirma borrado',
                                );
                            ?>
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->id_aplicacion }}</td>
                                <td>{{ $usuario->id_user_jefe }}</td>
                                <td>{{ $usuario->id_empresa }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellidos }}</td>
                                <td>{{ $usuario->nick }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->imagen }}</td>
                                <td>{{ $usuario->created_at }}</td>
                                <td>{{ $usuario->updated_at }}</td>
                                <td>
                                    <!-- a href="{ { route('hxxi.usuarios.mostrar',$usuario) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{ { route('hxxi.usuarios.editar',$usuario) }}" class="btn btn-primary">Editar</a>
                                    <a href="" data-target="#modal-delete-{ {$usuario->id}}" class="btn btn-danger" data-toggle="modal">Delete</a -->
                                    @include('includes.crud')
                                </td>
                            </tr>

                            @include('HXXI.usuarios.modal')
                        @endforeach
                    </table>

                    {!! $usuarios->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
