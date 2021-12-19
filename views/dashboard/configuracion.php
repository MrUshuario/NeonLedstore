<?php include 'layouts/loader.php'; ?>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<?php include 'layouts/header.php'; ?>
<section>
    <?php include 'layouts/nav.php'; ?>
</section>

<style>
    label {
        margin-right: 10px;
    }

    .fa-key {
        font-size: 1rem;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="header">
                    <h2>Configuracion</h2>
                </div>
                <div class="body">
                    <h3>Datos del <span id='rol'></span></h3>
                    <div class="form-group">
                        <label for="user">Usuario:</label>
                        <input class="form-control" type="text" id="user" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Cambiar contraseña</label>
                        <button id="btnModal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPassword">
                            <i class="fas fa-key"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="modalPassword" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPassword">Cambiar Contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label for="pass">Verificar Contraseña</label>
                    <input type="password" class="form-control" id="pass">
                </div>
                <form id="formpassword">
                    <div id="respuesta" class="m-1 d-none">
                        <label>Contraseña nueva:</label>
                        <input type="password" class="form-control" id="passnuevo1">
                    
                        <label>Confirmar contraseña</label>
                        <input type="password" class="form-control" id="passnuevo2">
                        <div id="mensaje"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="build/js/ajax/ajax.config.js"></script>
