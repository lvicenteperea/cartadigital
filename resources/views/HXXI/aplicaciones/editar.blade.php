@extends('HXXI.aplicaciones.index')

@section('opcion')
    <div class="card">
        <div class="card-header"><h3>{{ __('Aplicaciones') }}</h3></div>
        <br/>

        <div class="card">
        <!-- div class="card-header"><h3>{{ __('Aplicaciones') }}</h3></div>
            <br/ -->

            <div class="card-body">
                <form method="POST" action="{{ route('hxxi.aplicaciones.update', $hxxi_aplicacion) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                   value="{{ $hxxi_aplicacion->Nombre }}" required autofocus>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="text-danger">{{$errors->first('nombre')}}</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
