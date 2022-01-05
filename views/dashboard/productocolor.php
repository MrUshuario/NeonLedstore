<div class="content-principal container mt-20">
    <div class="flex-between">
        <h3>Producto con color</h3>

        <button type="button" id="model-register" data-bs-toggle="modal" data-bs-target="#modalProducto" class="btn-inline btn-success flex-center">
            <i class="fas fa-plus-circle"></i> Agregar
        </button>
    </div>
</div>

<div class="content-principal container mt-20">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-light table-fixed w-100" id="tablaproductocolor">
            <thead class="table-dark sticky">
                <tr>
                    <th>Producto</th>
                    <th>Color</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="modalProducto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Guardar Producto - Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formProductoColor">
                    <input type="hidden" id="id">
                    <div class="mb-3">
                        <label for="id_producto">Producto</label>
                        <select id="id_producto" class="form-control" required>
                            <option value="">--Seleccione--</option>
                        </select>
                        <!-- <img src="" class="w-100" alt="" id="img_pro"> -->
                    </div>
                    <div class="mb-3">
                        <label for="id_color">Color:</label>
                        <select id="id_color" class="form-control" required>
                            <option value="">--Seleccione--</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn-inline btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn-inline btn-primary" id="save">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="build/js/ajax/ajax.productoColor.js"></script>