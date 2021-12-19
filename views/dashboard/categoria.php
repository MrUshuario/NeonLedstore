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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categoria
                        </h2>
                        <ul class="header-dropdown m-t-5">
                            <button type="button" id="model-register" class="btn bg-teal waves-effect" data-bs-toggle="modal" data-bs-target="#modalCategoria">
                                <i class="material-icons">add_circle</i>
                                <span>AGREGAR NUEVO</span>
                            </button>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-light table-fixed" id="tablacategoria">
                                <thead class="table-dark sticky">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>link</th>
                                        <th>estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <img src="" id="img" width="">
                    <div class="mb-3">
                        <label for="cat_link">Link</label>
                        <input type="text" id="cat_link" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cat_estado">Estado</label>
                        <select id="cat_estado" class="form-control">
                            <option value="">--SELECCIONE--</option>
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


<script src="build/js/ajax/ajax.categoria.js"></script>