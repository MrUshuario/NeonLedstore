< class="content-principal container mt-20">
    <div class="flex-between">
        <h3>Compra </h3>

    </div>
</div>

<div class="content-principal container mt-20">
    <div class="table-responsive">
        <table class="table table-purple table-striped table-hover  w-100 table-light table-fixed" id="tablacliente">
             <!--PARA PONER CON BLANCO: table table-striped table-hover table-light table-fixed w-100-->    
            <thead class="table-dark sticky">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>email</th>
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


<!-- ./CONTENT -->
<div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalCliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Guardar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formCliente" enctype="multipart/form-data">
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

                    

                    
                </form>
            </div>
        </div>
    </div>
</div>


<script src="build/js/ajax/ajax.cliente.js"></script>
