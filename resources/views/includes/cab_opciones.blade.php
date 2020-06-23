<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"><h3>{{ $cab['titulo'] }}</h3></div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route($cab['ruta']) }}">
                @if(isset($cab['btn_ruta']))
                    {{ __($cab['btn_ruta']) }}
                @else
                    {{ __('btn_Volver') }}
                @endif
            </a>
        </div>
    </div>
</div>
<br/>
