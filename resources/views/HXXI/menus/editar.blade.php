@extends('layouts.app')

@section('content')
    <h1 class="page-header">{{ __('Menus') }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.mensaje')

                <?php $cab = array("titulo" => __('Crear nueva aplicación'),
                    "ruta"    => 'hxxi.menus.index');
                ?>
                @include('includes.cab_opciones')

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hxxi.menus.update', ['hxxi_menu' => $hxxi_menu]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('includes.campo_editar', ['label'=> 'id_aplicacion',         'id'=>'id_aplicacion',   'tipo'=>'text', 'nombre'=>'id_aplicacion',
                                                              'valor'=>$hxxi_menu->id_aplicacion, 'requerido'=>'required', 'autofocus'=>'autofocus'])

                            @include('includes.campo_editar', ['label'=> 'id_menu',          'id'=>'id_menu',            'tipo'=>'text', 'nombre'=>'id_menu',
                                                               'valor'=>$hxxi_menu->id_menu, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'tooltip',          'id'=>'tooltip',            'tipo'=>'text', 'nombre'=>'tooltip',
                                                               'valor'=>$hxxi_menu->tooltip, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'label',          'id'=>'label',            'tipo'=>'text', 'nombre'=>'label',
                                                               'valor'=>$hxxi_menu->label, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'orden',          'id'=>'orden',            'tipo'=>'text', 'nombre'=>'orden',
                                                               'valor'=>$hxxi_menu->orden, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'link',          'id'=>'link',            'tipo'=>'text', 'nombre'=>'link',
                                                               'valor'=>$hxxi_menu->link, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'role',          'id'=>'role',            'tipo'=>'text', 'nombre'=>'role',
                                                               'valor'=>$hxxi_menu->role, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'icono',          'id'=>'icono',            'nombre'=>'icono',
                                                               'valor'=>$hxxi_menu->icono, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'desde',          'id'=>'desde',            'tipo'=>'date', 'nombre'=>'desde',
                                                               'valor'=>$hxxi_menu->desde, 'requerido'=>'required'])

                            @include('includes.campo_editar', ['label'=> 'hasta',          'id'=>'hasta',            'tipo'=>'date', 'nombre'=>'hasta',
                                                               'valor'=>$hxxi_menu->hasta])

                            <button type="submit" class="btn btn-primary">{{ __('btn_Guardar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
