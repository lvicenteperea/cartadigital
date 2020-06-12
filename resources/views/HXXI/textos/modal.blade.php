<!-- Modal para DELETE-->
<div class="modal modal-danger fade" id="modal-delete-{{ $modal["id"] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">{{ $modal["cabecera"] ?? "Confirmación" }}</h4>
            </div>
            <form action="{ { route('hxxi.textos.borrar', ['hxxi_texto' => $texto]) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    <p class="text-center">{{ $modal["texto"] ?? "¿Está seguro?" }}</p>
                    <input type="hidden" name="category_id" id="cat_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">{{ $modal["boton1"] ?? "Cancelar" }}</button>
                    <button type="submit" class="btn btn-warning">{{ $modal["boton2"] ?? "Confirmar" }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

