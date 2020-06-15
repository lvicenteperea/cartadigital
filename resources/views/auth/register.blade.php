@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                @error('nombre')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                                @error('apellidos')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>
                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ old('nick') }}" required autocomplete="nick" autofocus>
                                @error('nick')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
                            <div class="col-md-6">
                                <input id="imagen" type="text" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>
                                @error('imagen')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_user_jefe" class="col-md-4 col-form-label text-md-right">{{ __('Jefe') }}</label>
                            <div class="col-md-6">
                                <input id="id_user_jefe" type="text" class="form-control @error('id_user_jefe') is-invalid @enderror" name="id_user_jefe" value="{{ old('id_user_jefe') }}" required autocomplete="id_user_jefe" autofocus>
                                @error('id_user_jefe')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>
                            <div class="col-md-6">
                                <input id="id_empresa" type="text" class="form-control @error('id_empresa') is-invalid @enderror" name="id_empresa" value="{{ old('id_empresa') }}" required autocomplete="id_empresa" autofocus>
                                @error('id_empresa')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_aplicacion" class="col-md-4 col-form-label text-md-right">{{ __('Aplicacion') }}</label>
                            <div class="col-md-6">
                                <input id="id_aplicacion" type="text" class="form-control @error('id_aplicacion') is-invalid @enderror" name="id_aplicacion" value="{{ old('id_aplicacion') }}" required autocomplete="id_aplicacion" autofocus>
                                @error('id_aplicacion')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="12345678" required autocomplete="new-password">
                                @error('password')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required value="12345678" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
