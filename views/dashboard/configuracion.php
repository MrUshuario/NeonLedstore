<style>
    label {
        margin-right: 10px;
    }

    .fas fa-key {
        font-size: 1rem;
    }
</style>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="header">
                    <h2>Configuracion</h2>
                </div>
                <div class="body">
                    <h3>Datos del <span id="rol"></span></h3>
                    <div class="form-group">
                        <label for="user">Usuario:</label>
                        <input class="form-control" type="text" id="user" disabled>
                    </div>
                 <form id="needs-validation" novalidate>
                 <div class="form-group">
                 <label>Contraseña actual</label>
                 <input class="form-control input-lg" placeholder="Ingresa tu contraseña actual" type="password"  id = "oldpw" required>
                 </div>
                 <div class="form-group">
                 <label>Nueva contraseña</label>
                 <input class="form-control input-lg" placeholder="Ingresa la nueva contraseña" type="password" id = "newpw" required>
                 </div>
                 
                 <div class="form-group">
                 <label>Repetir nueva contraseña</label>
                 <input class="form-control input-lg" placeholder="Repite la nueva contraseña" type="password"  id = "confirmpw" required>
                 </div>
                 
                 <p class="mb-4" style="color: #FF0000" id = "campo"></p>
                 <button class="btn btn-primary mt-2">Cambiar contraseña</button>
                 

                 </form>

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
