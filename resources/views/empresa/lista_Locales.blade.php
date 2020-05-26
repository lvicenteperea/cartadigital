@extends('layouts.app')

@section('content')
    <h1 class="page-header">Lista de locales</h1>

    <table style="border: 2px solid rgba(200, 100, 0, 0.3);">
        <tr style="background: rgba(255, 128, 0, 0.3); border: 2px solid rgba(200, 100, 0, 0.3);">
            <th>Id</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
        @foreach ($locales as $local)
            <tr>
                <td>{{ $local->id }}</td>
                <td>{{ $local->id_empresa }}</td>
                <td>{{ $local->nombre }}</td>
                <td>{{ $local->imagen }}</td>
                <td>{{ $local->telefono }}</td>
                <td>{{ $local->email }}</td>
            </tr>
        @endforeach
    </table>
    
    <h1>VAR DUMP</h1>
    <pre>     <?php var_dump($locales); ?>   </pre>
@endsection