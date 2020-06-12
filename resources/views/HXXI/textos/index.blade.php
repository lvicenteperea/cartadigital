@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Textos') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('hxxi.textos.crear') }}">Crear</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <!-- div class="card-header"><h3>{ { __('Textos') }}</h3></div -->
                    <br/>

                    <div class="card">
                        <!-- div class="card-header"><h3>{ { __('Textos') }}</h3></div>
                        <br/ -->
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Descripción</th>
                                <th>División</th>
                                <th>Subdivión</th>
                                <th>creado</th>
                                <th>modificado</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($textos as $texto)
                                <tr>
                                    <td>{{ $texto->id }}</td>
                                    <td>{{ $texto->descripcion }}</td>
                                    <td>{{ $texto->division }}</td>
                                    <td>{{ $texto->subdivision }}</td>
                                    <td>{{ $texto->created_at }}</td>
                                    <td>{{ $texto->updated_at }}</td>
                                    <td><a href="{{ route('hxxi.txt_idiomas.index') }}" class="btn btn-default">Textos</a>
                                        <a href="{{ route('hxxi.textos.mostrar',$texto) }}" class="btn btn-info">Mostrar</a>
                                        <a href="{{ route('hxxi.textos.editar',$texto) }}" class="btn btn-primary">Editar</a>
                                        <a href="" data-target="#modal-delete-{{$texto->id}}" class="btn btn-danger" data-toggle="modal">Delete</a>
                                    </td>
                                </tr>

                                <?php $modal = array("id"       => $texto->id,
                                                     "cabecera" => 'Confirmación de borrado',
                                                     "texto"    => '¿Seguro que quieres borrar "'. $texto->descripcion .'"?',
                                                     "boton1"   => 'Cancelar',
                                                     "boton2"   => 'Confirma borrado',
                                                    );
                                ?>
                                @include('HXXI.textos.modal')
                            @endforeach
                        </table>

                        {!! $textos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
