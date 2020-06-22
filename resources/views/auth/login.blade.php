@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.mensaje')

            <?php $cab = array("titulo" => __('Login'),
                "ruta"    => 'hxxi.aplicaciones.index');
            ?>
            @include('includes.cab_opciones')

            <div class="card">
                <!-- div class="card-header">{{ __('Login') }}</div -->

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_aplicacion" class="col-md-4 col-form-label text-md-right">{{ __('Aplicación') }}</label>
                            <div class="col-md-6">
                                <select name="id_aplicacion[]" id="id_aplicacion" class="form-control @error('id_aplicacion') is-invalid @enderror" class="form-control">
                                    <option value="1"> Hangar XXI</option>
                                    <option value="2"> Points de Mondelez</option>
                                </select>
                                @error('id_aplicacion')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                            <!-- input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@hangarxxi.com" required autocomplete="email" autofocus>
                                @error('email')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="12345678" required autocomplete="current-password">
                                @error('password')  @include('includes.msj_campo') @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
