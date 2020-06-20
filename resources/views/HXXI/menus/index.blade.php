@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Menus') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Lista'),
                                   "ruta"    => 'hxxi.menus.crear',
                                   "btn_ruta" => __('btn_Crear')
                );
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>id_aplicacion</th>
                            <th>id_menu</th>
                            <th>tootip</th>
                            <th>label</th>
                            <th>orden</th>
                            <th>link</th>
                            <th>role</th>
                            <th>icono</th>
                            <th>desde</th>
                            <th>hasta</th>
                            <th>creado</th>
                            <th>modificado</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->id_aplicacion }}</td>
                                <td>{{ $menu->id_menu }}</td>
                                <td>{{ $menu->tootip }}</td>
                                <td>{{ $menu->label }}</td>
                                <td>{{ $menu->orden }}</td>
                                <td>{{ $menu->link }}</td>
                                <td>{{ $menu->role }}</td>
                                <td>{{ $menu->icono }}</td>
                                <td>{{ $menu->desde }}</td>
                                <td>{{ $menu->hasta }}</td>
                                <td>{{ $menu->created_at }}</td>
                                <td>{{ $menu->updated_at }}</td>
                                <td><a href="{{ route('hxxi.menus.mostrar',$menu) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{{ route('hxxi.menus.editar',$menu) }}" class="btn btn-primary">Editar</a>
                                    <a href="" data-target="#modal-delete-{{$menu->id}}" class="btn btn-danger" data-toggle="modal">Delete</a>
                                </td>
                            </tr>

                            <?php $modal = array("id"       => $menu->id,
                                                 "cabecera" => 'Confirmación de borrado',
                                                 "menu"    => '¿Seguro que quieres borrar "'. $menu->descripcion .'"?',
                                                 "boton1"   => 'Cancelar',
                                                 "boton2"   => 'Confirma borrado',
                                                );
                            ?>
                            @include('HXXI.menus.modal')
                        @endforeach
                    </table>

                    {!! $menus->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
