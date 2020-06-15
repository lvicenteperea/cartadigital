@extends('layouts.app')

@section('content')
<h1 class="page-header">Configurar usuario</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.mensaje')

            <div class="card">
                <div class="card-header"><h3>{{ __('Configuración de mi Cuenta') }}</h3></div>
                <br/>

                <!-- ------------------------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------------------------ -->
                <!-- Formulario cambio de datos personales  -->
                <!-- ------------------------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------------------------ -->
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ Auth::user()->nombre }}" required autocomplete="nombre" autofocus>
                                @error('nombre')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ Auth::user()->apellidos }}" required autocomplete="apellidos" autofocus>
                                @error('apellidos')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ Auth::user()->nick }}" required autocomplete="nick" autofocus>
                                @error('nick')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                @error('email')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen_path" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                @include('includes.avatar')
                                <input id="imagen_path" type="file" class="form-control @error('imagen_path') is-invalid @enderror" name="imagen_path" autocomplete="imagen_path">
                                @error('imagen_path')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                            <div class="col-md-6">
                                <!-- input id="id_empresa" type="text" class="form-control @error('id_empresa') is-invalid @enderror" name="id_empresa" value="{ { Auth::user()->id_empresa }}" required autocomplete="id_empresa" -->
                                <select name="id_empresa[]" id="id_empresa" class="form-control @error('id_empresa') is-invalid @enderror" class="form-control">
                                    @foreach($empresas as $empresa)
                                        <option value="{{ $empresa->id }}" {{ (Auth::user()->id_empresa == $empresa->id) ? 'selected':'' }}> {{ $empresa->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('id_empresa')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_user_jefe" class="col-md-4 col-form-label text-md-right">{{ __('Jefe') }}</label>
                            <div class="col-md-6">
                                <select name="id_user_jefe[]" id="id_user_jefe" class="form-control @error('id_user_jefe') is-invalid @enderror" class="form-control">
                                    @foreach($jefes as $jefe)
                                        <option value="{{ $jefe->id }}" {{ ($usuario->id_user_jefe == $jefe->id) ? 'selected':'' }}> {{ $jefe->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('id_user_jefe')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_aplicacion" class="col-md-4 col-form-label text-md-right">{{ __('Aplicación') }}</label>
                            <div class="col-md-6">
                                <select name="id_aplicacion[]" id="id_aplicacion" class="form-control @error('id_aplicacion') is-invalid @enderror" class="form-control">
                                    @foreach($aplicaciones as $apli)
                                        <option value="{{ $apli->id }}" {{ ($usuario->id_aplicacion == $apli->id) ? 'selected':'' }}> {{ $apli->Nombre }}</option>
                                    @endforeach
                                </select>
                                @error('id_aplicacion')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <hr/>

                <!-- ------------------------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------------------------ -->
                <!-- Formulario cambio de contraseña  -->
                <!-- ------------------------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------------------------ -->
                <div class="card">
                    <div class="card-header"><h3>{{ __('Cambio de contraseña') }}</h3></div>
                    <br/>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.updatePwd') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="mypassword" class="col-md-4 col-form-label text-md-right">{{ __('Mi Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="mypassword" type="password" class="form-control @error('mypassword') is-invalid @enderror" name="mypassword" value="" required autofocus>
                                    @error('mypassword')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required>
                                    @error('password')  @include('includes.msj_campo') @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mypassword" class="col-md-4 col-form-label text-md-right">{{ __('Confirma Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Cambiar mi password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
