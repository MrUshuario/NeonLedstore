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
                                PRODUCTOS
                            </h2>
                            <ul class="header-dropdown m-t-5">
                                <button type="button" id="model-register" class="btn bg-teal waves-effect" data-bs-toggle="modal" data-bs-target="#modalProducto">
                                    <i class="material-icons">add_circle</i>
                                    <span>AGREGAR NUEVO</span>
                                </button>
                            </ul>
                        </div>
                        <div class="body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-light table-fixed w-100" id="tablaproducto">
                                    <thead class="table-dark sticky">
                                     <tr>
                                            <th>Categoria</th>
                                            <th>Producto</th>
                                            <th>precio</th>
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
                                <form id="formProducto" enctype="multipart/form-data">
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
                                        <input type="number" id="pro_precio" class="form-control" step="0.05" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Imagen</label>
                                        <input type="file" id="pro_imagen" class="form-control">
                                    </div>
                                    <img id="pro_img">
                                    <div class="mb-3">
                                        <label for="">Tamaño de producto</label>
                                        <div class="tmn-input">
                                        <input type="number" step="0.10" min="1.0" id="t-1"> X <input type="number" step="0.10" min="1.0" id="t-2" >
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
                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" id="save">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

            
        </div>
    </section>

    <script src="build/js/ajax/ajax.producto.js"></script>