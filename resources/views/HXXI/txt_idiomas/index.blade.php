@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos Idiomas') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Lista textos idiomas'),
                    "ruta"    => 'hxxi.txt_idiomas.crear',
                    "btn_ruta" => __('btn_Crear')
                );
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <table class="tabla-crud table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>id_texto</th>
                            <th>id_idioma</th>
                            <th>Texto</th>
                            <th>creado</th>
                            <th>modificado</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($textos as $texto)
                            <?php
                                /*--- Parametros para los includes ---*/
                                $crud = array("ruta" => "hxxi.txt_idiomas",
                                              "item" => $texto,
                                );

                                $modal = array("id"       => $texto->id,
                                               "cabecera" => 'Confirmación de borrado',
                                               "texto"    => '¿Seguro que quieres borrar "'. $texto->texto .'"?',
                                               "boton1"   => 'Cancelar',
                                               "boton2"   => 'Confirma borrado',
                                );
                            ?>
                            <tr>
                                <td>{{ $texto->id }}</td>
                                <td>{{ $texto->id_texto }}</td>
                                <td>{{ $texto->id_idioma }}</td>
                                <td>{{ $texto->texto }}</td>
                                <td>{{ $texto->created_at }}</td>
                                <td>{{ $texto->updated_at }}</td>
                                <td>
                                    <!-- a href="{ { route('hxxi.txt_idiomas.mostrar',$texto) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{ { route('hxxi.txt_idiomas.editar',$texto) }}" class="btn btn-primary">Editar</a>
                                    <a href="" data-target="#modal-delete-{ { $texto->id }}" class="btn btn-danger" data-toggle="modal">Delete</a -->
                                    @include('includes.crud')
                                </td>
                            </tr>

                            @include('HXXI.txt_idiomas.modal')
                        @endforeach
                    </table>

                    {!! $textos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
