@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Menus') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nuevo Menu'),
                                   "ruta"    => 'hxxi.menus.index');
                ?>
                @include('includes.cab_opciones')
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.menus.create') }}" enctype="multipart/form-data">
                            @csrf
                            @include('includes.campo_editar', ['label'=> 'id_aplicacion',  'id'=>'id_aplicacion', 'nombre'=>'id_aplicacion', 'requerido'=>'required', 'autofocus'=>'autofocus'])
                            @include('includes.campo_editar', ['label'=> 'id_menu',        'id'=>'id_menu',        'nombre'=>'id_menu', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'tooltip',        'id'=>'tooltip',        'nombre'=>'tooltip', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'label',          'id'=>'label',          'nombre'=>'label', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'orden',          'id'=>'orden',          'nombre'=>'orden', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'link',           'id'=>'link',           'nombre'=>'link', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'role',           'id'=>'role',           'nombre'=>'role', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'icono',          'id'=>'icono',          'nombre'=>'icono', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'desde',          'id'=>'desde',          'tipo'=>'date', 'nombre'=>'desde', 'requerido'=>'required'])
                            @include('includes.campo_editar', ['label'=> 'hasta',          'id'=>'hasta',           'tipo'=>'date', 'nombre'=>'hasta'])

                            <button type="submit" class="btn btn-primary">{{ __('btn_Guardar') }}</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
