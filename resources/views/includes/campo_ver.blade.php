{{-- Plantilla de llamada --}}
{{--
   @include('includes.campo_editar', ['label'=> 'id_aplicacion', 'valor'=>$hxxi_usuario->id_aplicacion])
--}}

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{ __($label) }}</strong>             {{ $valor }}
    </div>
</div>
