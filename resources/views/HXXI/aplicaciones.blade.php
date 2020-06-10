@extends('layouts.app')

@section('content')
    <h1 class="page-header">Aplicaciones</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <div class="card">
                    <div class="card-header"><h3>{{ __('Aplicaciones') }}</h3></div>
                    <br/>

                    <div class="card">
                        <!-- div class="card-header"><h3>{{ __('Aplicaciones') }}</h3></div>
                        <br/ -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('hxxi.aplicaciones') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="mypassword" class="col-md-4 col-form-label text-md-right">{{ __('Mi Contraseña') }}</label>
                                    <div class="col-md-6">
                                        <input id="mypassword" type="password" class="form-control @error('mypassword') is-invalid @enderror" name="mypassword"
                                               value="{{ \Auth::user()->password }}" required autocomplete="mypassword" autofocus>
                                        @error('mypassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-danger">{{$errors->first('mypassword')}}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-danger">{{$errors->first('password')}}</div>
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
