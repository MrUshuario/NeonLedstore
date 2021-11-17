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
                <button type="button" id="model-register" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalColor">
                    Registrar Color
                </button>

                <div class="modal fade" id="modalColor" tabindex="-1" aria-labelledby="modalColor" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalColor">Guardar Color</h5>
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
                <div class="m-1">
                    <label for="buscarnombre">Buscar :</label>
                    <input type="text" id="buscarnombre">
                </div>
                <div class="table-responsive tabla">
                    <table class="table table-striped table-hover table-light table-fixed" id="tablacolor">
                        <thead class="table-dark sticky" >
                            <tr>
                                <th>Nombre</th>
                                <th>Codigo de color</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                            
                        </tbody>
                    </table>
                </div>

                <div id="paginacion" class="">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item" id="inicio"><a class="page-link" href="/color?pag=<?php echo $_GET['pag'] - 1; ?>">Previous</a></li>
                    
                    <li class="page-item" id="end"><a class="page-link" href="/color?pag=<?php echo $_GET['pag'] + 1; ?>">Next</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </section>
 
    <script src="build/js/ajaxColor.js"></script>