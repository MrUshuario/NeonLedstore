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
                        <h2>Color</h2>
                        <ul class="header-dropdown m-t-5">
                            <button type="button" id="model-register" class="btn bg-teal waves-effect" data-bs-toggle="modal" data-bs-target="#modalColor">
                                <i class="material-icons">add_circle</i>
                                <span>AGREGAR NUEVO</span>
                            </button>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover  w-100 table-light table-fixed" id="tablacolor">
                                <thead class="table-dark sticky">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo de color</th>
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

<div class="modal fade" id="modalColor" tabindex="-1" aria-labelledby="modalColor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Guardar Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="post" id="formColor">
                    <input type="hidden" id="id">
                    <div class="mb-3">
                        <label for="nombre">Nombre de color</label>
                        <input type="text" class="form-control" id="nombreColor">
                    </div>
                    <div class="mb-3 flex">
                        <label for="rgb">Color</label>
                        <input type="color" class="form-color" id="rgb">
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

<script src="build/js/ajax/ajaxColor.js"></script>