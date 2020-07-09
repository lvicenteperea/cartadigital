<a href="{{ route($crud["ruta"]. '.mostrar',$crud["item"]) }}" class="boton-icono">
    <img src="/css/iconos/view.svg" alt="Ver" width="15" height="15" /></a>
<a href="{{ route($crud["ruta"]. '.editar',$crud["item"]) }}" class="boton-icono">
    <img src="/css/iconos/pencil.svg" alt="Editar" width="15" height="15" /></a>
<a href="" data-target="#modal-delete-{{$crud["item"]->id}}" class="boton-icono" data-toggle="modal">
    <img src="/css/iconos/trash.svg" alt="Borrar" width="15" height="15" /></a>
