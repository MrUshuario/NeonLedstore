<body class="theme-red">
    <?php require 'layouts/loader.php'; ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <?php require 'layouts/header.php'; ?>
    <section>
        <?php require 'layouts/nav.php'; ?>
    </section>
    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card border border-info">
                        <div class="header">
                            <h2 class= "card-header" >
                                CLIENTES
                            </h2>
                            <ul style="line-height: 2.8;" class="header-dropdown m-t--5">
                                <button type="button" class="btn bg-teal waves-effect"data-bs-toggle="modal" data-bs-target="#modalCliente">
                                    <i class="material-icons">add_circle</i>
                                    <span>Agregar Cliente</span>
                                </button>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tablacliente">
                                    <thead> -->
                                    <table class="table table-striped table-hover table-light table-fixed" id="tablacliente">
                                <thead class="table-dark sticky">
                                        <tr >
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Clave</th>
                                            <th>Estado</th>
                                            <th>Editar/Borrar</th>
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
            <!-- #END# Basic Examples -->
        </div>
    </section>
    <!-- ./CONTENT -->
    <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalCliente" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Guardar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <form  id="formCliente" enctype="multipart/form-data">
                                    <input type="hidden" id="id">
                                    <div class="mb-3">
                                    <label for="nombre">Nombre Cliente</label>
                                    <input type="text" class="form-control" id="cli_nombre">
                                    </div>

                                    <div class="mb-3">
                                    <label for="nombre">Apellido Cliente</label>
                                    <input type="text" class="form-control" id="cli_apellidos">
                                    </div>

                                    <div class="mb-3">
                                    <label for="nombre">Email Cliente</label>
                                    <input type="text" class="form-control" id="cli_email">
                                    </div>

                                    <div class="mb-3">
                                    <label for="nombre">Clave Cliente</label>
                                    <input type="password" class="form-control" id="cli_clave">
                                    </div>

                                    <div class="mb-3">
                                    <label for="nombre">Estado Cliente</label>
                                    <select id="cli_estado" class="form-control">
                                    <option value="">--SELECCIONE--</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
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
</body>

<script src="build/js/ajax.cliente.js"></script>