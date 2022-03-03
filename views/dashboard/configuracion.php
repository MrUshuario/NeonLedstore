<style>
    .body {
        display: block;
    }
    }
</style>
<div class="content-principal container mt-20">
    <div class="container-fluid">
        <div class="row clearfix">
            
                <div class="body">
                <h2 style="text-align:center">Configuración Contraseña</h2>
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                       
                            <h3>Usuario: <span id="rol"></span></h3>
                        </div>

                        <div class="col-lg-5">
                            <div class="form-group">                             
                                <input class="form-control" type="text" id="cli_email" disabled>
                            </div>
                        </div>
                        
                    </div>        
                    </div>

                        <form id="formpassword">
                        <div class="form-group">
                        <label>Contraseña actual</label>
                        <input class="form-control input-lg" placeholder="Ingresa tu contraseña actual" type="password"  id = "pass" required>
                        </div>

                        <div id="respuesta" class="m-1 d-none">

                            <label>Nueva contraseña</label>
                            <input class="form-control input-lg" placeholder="Ingresa la nueva contraseña" type="password" id = "passnuevo1" required>

                        

                            <label>Repetir nueva contraseña</label>
                            <input class="form-control input-lg" placeholder="Repite la nueva contraseña" type="password"  id = "passnuevo2" required>


                            <div id="mensaje"></div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="save">Save changes</button>
                            </div>
                        </div>
                        </form>
                </div>
           
        </div>
    </div>
</div>
<script src="build/js/ajax/ajax.config.js"></script>
