@extends('layouts.app')

@section('content')
    <h1 class="page-header">Aplicaciones</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('hxxi.aplicaciones.crear') }}">Crear</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <!-- div class="card-header"><h3>{ { __('Aplicaciones') }}</h3></div -->
                    <br/>

                    <div class="card">
                        <!-- div class="card-header"><h3>{ { __('Aplicaciones') }}</h3></div>
                        <br/ -->
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
                                    <td>
                                        <form action="{{ route('hxxi.aplicaciones.borrar',$apli->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('hxxi.aplicaciones.mostrar',$apli) }}">Mostrar</a>
                                            <a class="btn btn-primary" href="{{ route('hxxi.aplicaciones.editar',$apli) }}">Editar</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $aplicaciones->links() !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <main class="py-4">
                    @yield('opcion', 'Vacío')
                </main>
            </div>
        </div>
    </div>

    <!-- Modal para DELETE-->
    <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                </div>
                <form action="{{route('hxxi.aplicaciones.borrar', $apli->id))}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" name="category_id" id="cat_id" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-warning">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
