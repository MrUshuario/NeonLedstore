<div class="content-principal container mt-20">
    <div class="flex-between">
        <h3>Productos</h3>
        <button type="button" id="model-register" data-bs-toggle="modal" data-bs-target="#modalProducto" class="btn-inline btn-success flex-center">
            <i class="fas fa-plus-circle"></i> Agregar Producto
        </button>
    </div>
</div>


<div class="content-principal container mt-20">
    <div class="table-responsive">
        <table class="table table-purple table-striped table-hover  w-100 table-light table-fixed" id="tablaproducto">
            <thead class="table-dark sticky">
                <tr>
                    <th> Nombre Categoría </th>
                    <th>Nombre </th>
                    <th>Descripción </th>
                    <th>Precio (s/) </th>
                    <th>Imagen </th>
                    <th>Tamaño </th>
                    <th>Estado </th>
                    <th>Editar/Eliminar </th>
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
                <h5 class="modal-title" id="title">Guardar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formProducto" enctype="multipart/form-data" class="color-dark">
                    <input type="hidden" id="id">
                    <div class="mb-3">
                        <label for="pro_categoria">Categoría</label>
                        <select id="pro_categoria" class="form-control">
                            <option value="">--Seleccione--</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Nombre de Producto</label>
                        <input type="text" id="pro_nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">descripcion</label>
                        <textarea id="pro_descripcion" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Precio</label>
                        <input type="number" id="pro_precio" class="form-control" step="0.05">
                    </div>
                    <div class="mb-3">
                        <label for="">Imagen</label>
                        <input type="file" id="pro_imagen" class="form-control">
                    </div>
                    <img id="pro_img">
                    <div class="mb-3">
                        <label for="">Tamaño de producto</label>
                        <div class="tmn-input">
                            <input type="number" step="0.10" min="1.0" id="t-1"> X <input type="number" step="0.10" min="1.0" id="t-2">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pro_estado">estado</label>
                        <select id="pro_estado" class="form-control">
                            <option value="">-SELECCIONE--</option>
                            <option value="Activo">ACTIVO</option>
                            <option value="Inactivo">INACTIVO</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn-inline btn-secondary " data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn-inline btn-primary " id="save">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="build/js/ajax/ajax.producto.js"></script>
