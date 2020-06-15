@extends('layouts.app')

@section('content')
    <h1 class="page-header">Aplicaciones</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Lista'),
                                   "ruta"    => 'hxxi.aplicaciones.crear',
                                   "btn_ruta" => __('btn_Crear')
                                  );
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nombre</th>
                            <th>creado</th>
                            <th>modificado</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($aplicaciones as $apli)
                            <tr>
                                <td>{{ $apli->id }}</td>
                                <td>{{ $apli->Nombre }}</td>
                                <td>{{ $apli->created_at }}</td>
                                <td>{{ $apli->updated_at }}</td>
                                <td><a href="{{ route('hxxi.aplicaciones.mostrar',$apli) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{{ route('hxxi.aplicaciones.editar',$apli) }}" class="btn btn-primary">Editar</a>
                                    <a  href="" data-target="#modal-delete-{{$apli->id}}" class="btn btn-danger" data-toggle="modal">Delete</a>
                                </td>
                            </tr>

                            <?php $modal = array("cabecera" => 'Confirmación de borrado',
                                                 "texto"    => '¿Seguro que quieres borrar "'. $apli->Nombre .'"?',
                                                 "boton1" => 'Cancelar',
                                                 "boton2" => 'Confirma borrado');
                            ?>
                            @include('HXXI.aplicaciones.modal')
                        @endforeach
                    </table>

                    {!! $aplicaciones->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
