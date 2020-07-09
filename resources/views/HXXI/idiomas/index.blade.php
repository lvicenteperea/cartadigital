@extends('layouts.app')

@section('content')
    <h1 class="page-header">Idiomas</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Lista'),
                    "ruta"    => 'hxxi.idiomas.crear',
                    "btn_ruta" => __('btn_Crear')
                );
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <table class="tabla-crud table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nombre</th>
                            <th>ANSI</th>
                            <th>Idioma</th>
                            <th>creado</th>
                            <th>modificado</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($idiomas as $idioma)
                            <?php
                                /*--- Parametros para los includes ---*/
                                $crud = array("ruta" => "hxxi.idiomas",
                                              "item" => $idioma,
                                );
                                $modal = array("cabecera" => 'Confirmación de borrado',
                                               "texto"    => '¿Seguro que quieres borrar "'. $idioma->nombre .'"?',
                                               "boton1" => 'Cancelar',
                                               "boton2" => 'Confirma borrado'
                                );
                            ?>                            <tr>
                                <td>{{ $idioma->id }}</td>
                                <td>{{ $idioma->nombre }}</td>
                                <td>{{ $idioma->ansi }}</td>
                                <td>{{ $idioma->idioma }}_{{ $idioma->pais }}</td>
                                <td>{{ $idioma->created_at }}</td>
                                <td>{{ $idioma->updated_at }}</td>
                                <td>
                                    <!-- a href="{ { route('hxxi.idiomas.mostrar',$idioma) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{ { route('hxxi.idiomas.editar',$idioma) }}" class="btn btn-primary">Editar</a>
                                    <a  href="" data-target="#modal-delete-{ {$idioma->id}}" class="btn btn-danger" data-toggle="modal">Delete</a -->
                                    @include('includes.crud')
                                </td>
                            </tr>

                            @include('HXXI.idiomas.modal')
                        @endforeach
                    </table>

                    {!! $idiomas->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
