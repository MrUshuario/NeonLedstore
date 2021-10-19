<?php include 'layouts/loader.php'; ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <?php include 'layouts/header.php'; ?>
    <section>
        <?php include 'layouts/nav.php'; ?>
    </section>
    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <button type="button" id="model-register" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategoria">
                    Registrar Categoria
                </button>

                <div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalColor" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalColor">Guardar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
                            </div>
                            <div class="modal-body">
                            <form id="formCategoria" enctype="multipart/form-data">
                                <input type="hidden" id="id">
                                <div class="mb-3">
                                    <label for="nombre">Nombre de categora</label>
                                    <input type="text" class="form-control" id="cat_nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="cat_imagen">Imagen</label>
                                    <input type="file" id="cat_imagen" class="form-control">
                                </div>
                                <div class="mb-3" id="img">

                                </div>
                                <div class="mb-3">
                                    <label for="cat_link">Link</label>
                                    <input type="text" id="cat_link" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="cat_estado">Estado</label>
                                    <select id="cat_estado" class="form-control">
                                        <option value="null">--SELECCIONE--</option>
                                        <option value="ACTIVO">Activo</option>
                                        <option value="INACTIVO">Inactivo</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" id="save">Guardar</button>
                                </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="m-1">
                    <label for="buscarnombre">Buscar :</label>
                    <input type="text" id="buscarnombre">
                </div>
                <div class="table-responsive tabla">
                    <table class="table table-striped table-hover table-light table-fixed" id="tablacategoria">
                        <thead class="table-dark sticky" >
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>link</th>
                                <th>estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="build/js/ajax.categoria.js"></script>