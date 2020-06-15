@extends('layouts.app')

@section('content')
<h1 class="page-header">Perfil de usuario</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.mensaje')
            <div class="row">
                <div class="col-md-6">
                    @if($user->imagen)
                        <div class="image-container">
                        <img src="{{ route('user.avatar', ['NombFic' => $user->imagen]) }}" class="gran-avatar"/>
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <h1>{{ $user->nombre .' '. $user->apellidos .' (@'. $user->nick .')' }}</h1>
                    <h2>Email:   <strong> {{ ' '. $user->email }}</strong> </h2>
                    <h3>Imagen:  <strong> {{ ' '. $user->imagen }}</strong> </h3>
                    <h3>Rol:     <strong> {{ ' '. $user->role }}</strong> </h3>
                    <h3>Empresa: <strong> {{ ' '. $user->id_empresa }}</strong> </h3>
                    <h3>Jefe:    <strong> {{ ' '. $user->id_user_jefe }}</strong> </h3>
                    <h3>Aplicación: <strong> {{ ' '. $user->id_aplicacion }}</strong> </h3>
                    <span> {{ 'Se unió: '. \Fechas::CuantoTiempoHace($user->created_at) }} </span>
                    <hr/>
                </div>
                <div class="clearfix"></div>
            </div>


        </div>
    </div>
</div>
@endsection
