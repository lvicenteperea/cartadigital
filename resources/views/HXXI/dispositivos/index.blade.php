@extends('layouts.app')

@section('content')
    <h1 class="page-header">Dispositivos</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Lista'),
                                   "ruta"    => 'hxxi.dispositivos.crear',
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
                        @foreach ($dispositivos as $disp)
                            <tr>
                                <td>{{ $disp->id }}</td>
                                <td>{{ $disp->nombre }}</td>
                                <td>{{ $disp->created_at }}</td>
                                <td>{{ $disp->updated_at }}</td>
                                <td><a href="{{ route('hxxi.dispositivos.mostrar',$disp) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{{ route('hxxi.dispositivos.editar',$disp) }}" class="btn btn-primary">Editar</a>
                                    <a  href="" data-target="#modal-delete-{{$disp->id}}" class="btn btn-danger" data-toggle="modal">Delete</a>
                                </td>
                            </tr>

                            <?php $modal = array("cabecera" => 'Confirmación de borrado',
                                                 "texto"    => '¿Seguro que quieres borrar "'. $disp->nombre .'"?',
                                                 "boton1" => 'Cancelar',
                                                 "boton2" => 'Confirma borrado');
                            ?>
                            @include('HXXI.dispositivos.modal')
                        @endforeach
                    </table>

                    {!! $dispositivos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
