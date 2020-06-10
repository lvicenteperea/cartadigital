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
                            @foreach ($hxxi_aplicacion as $apli)
                                <tr>
                                    <td>{{ ++$i }} - {{ $apli->id }}</td>
                                    <td>{{ $apli->Nombre }}</td>
                                    <td>{{ $apli->created_at }}</td>
                                    <td>{{ $apli->updated_at }}</td>
                                    <td>
                                        <form action="{{ route('hxxi.aplicaciones.borrar',$apli->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('hxxi.aplicaciones.mostrar',$apli->id) }}">Mostrar</a>
                                            <a class="btn btn-primary" href="{{ route('hxxi.aplicaciones.editar',$apli) }}">Editar</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection
