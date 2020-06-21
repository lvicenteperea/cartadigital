{{-- Plantilla de llamada --}}
{{--
 @include('includes.campo_editar', ['label'=> 'link',
                                    'id'=>'link',
                                    'tipo'=>'text',
                                    'nombre'=>'link',
                                    'valor'=>$hxxi_menu->link,
                                    'requerido'=>'required',
                                    'autofocus'=>''
                                   ])
--}}
<div class="form-group row">
    <label for="hasta" class="col-md-4 col-form-label text-md-right">{{ __($label) }}</label>
    <div class="col-md-6">
        <input id="{{ $id }}"
               type="{{ $tipo ?? 'text'}}"
               class="form-control @error('{{ $id }}') is-invalid @enderror"
               name="{{ $nombre }}"
               value="{{ $valor }}"
               @isset($requerido)
                    $requerido
               @endisset
               @isset($autofocus)
                    $autofocus
               @endisset>
        @error("{{ $id }}")  @include('includes.msj_campo') @enderror
    </div>
</div>
