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
                                <button type="button" class="btn bg-teal waves-effect"data-bs-toggle="modal" data-bs-target="#modalProducto">
                                    <i class="material-icons">add_circle</i>
                                    <span>AGREGAR NUEVO</span>
                                </button>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr class="table-info">
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
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
    <div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="modalProducto" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Guardar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <form action=""></form>
                            </div>
                        </div>
                    </div>
                </div>
</body>