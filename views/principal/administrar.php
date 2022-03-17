<section class="bg-black pt-5 pb-5 text-white">
<div class="pt-5 page-container bg-black">
        <div class="container espAdminR">
            <h2 class="text-white display-1 weight-medium m-3">ADMINISTRAR PHP</h2>
        
                    <!--CONTENIDO-->       
            
                    <div class="recipient">
                        <div class="contenedor-menuAdmin">
                            <div class="sobre-admin">
                                <h3><i class="fa-solid fa-address-card"></i> Sobre el Cliente: </h3>
                            </div>
                            <ul class="menuAdmin">
                                <!-- <a href="#"><li class="listaAdmin"><i class="icon_izq_admin fa-solid fa-user-gear"></i>  Sobre el Cliente</li></a> -->
                                <a href="#"><li class="listaAdmin" onclick="cambioHistorial()"><i class="icon_izq_admin fa-solid fa-boxes-stacked"></i>  Historial de Factura</li></a>
                                <a href="#"><li class="listaAdmin" onclick="cambioDatosPersonales()"><i class="fa-regular fa-circle-user"></i>  Datos Personales</li></a>
                                <a href="#"><li class="listaAdmin" onclick="cambioContrasena()"><i class="fa-solid fa-lock"></i> Cambiar Contraseña</li></a>
                                <a href="#"><li class="listaAdmin" onclick="verificacionCorreo()"><i class="fas fa-user-check"></i> Verificar Correo</li></a>
                            </ul>                         
                        </div>


                        <div class="mostrar-res" id="es">
                            <!-- primer registro -->
                            <div class="row espacio-admin" id="cambioFontHistorial">
                              <!-- principal registro  -->
                              <div class="row espacio-admin">
                                <div class="col-sm-12">
                                    <table class="table table-purple table-striped table-hover  w-100 table-light table-fixed" id="clientecompraver">
                                        <!--PARA PONER CON BLANCO: table table-striped table-hover table-light table-fixed w-100-->    
                                        <thead class="table-dark sticky">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Precio total</th>
                                                <th>Ver detalles</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>

                            </div> <!--fin de principal registro -->
                                <div class="col-sm-12">
                                    <table class="table table-purple table-striped table-hover w-100 table-light table-fixed dataTable no-footer" id="CompraDetalle" role="grid" aria-describedby="CompraDetalle_info" style="width: 822px;">
                                        <!--PARA PONER CON BLANCO: table table-striped table-hover table-light table-fixed w-100-->    
                                        <thead class="table-dark sticky">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Codigo detalle: activate to sort column descending" aria-sort="ascending" style="width: 143px;">Codigo detalle</th>
                                                <th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Codigo Compra: activate to sort column ascending" style="width: 153px;">Codigo Compra</th>
                                                <th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Producto ID: activate to sort column ascending" style="width: 119px;">Producto ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Cantidad: activate to sort column ascending" style="width: 91px;">Cantidad</th>
                                                <th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Detalle color : activate to sort column ascending" style="width: 126px;">Detalle color </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table> 
                                </div>
                            </div>

                         <!--Datos Personales-->     
                         <div class="container">
                                <section class="fondo-null espacio-admin" id="cambioDatosUsuarios">
                                        <div class="container yo">
                                            <div class="col mx-1  pt-3 mb-1 border neontabla">
                                                    <h2 class= "neones"><i class="fa-solid fa-user-pen"></i> Datos Personales </h2>
                                                        <div class="container">
                                                        <div class="row">
                                                            <div class=" my-auto mx-auto">          
                                                                <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="hidden" id="id"><!--variable invisible-->
                                                                <label for="nombre" style="color: white;">Nombre: </label>          
                                                                <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" id="cli_nombre"><br>
                                                                <label for="nombre" style="color: white;">Apellidos: </label>  
                                                                <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" id="cli_apellidos" value="apellido"><br>
                                                                <label for="nombre" style="color: white;">Correo: </label>
                                                                <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" id="cli_email" value="correo" disabled><br>
                                                                <label for="nombre" style="color: white;">Teléfono: </label>  
                                                                <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="number" id="cli_telefono"> <br>

                                                                <div class="espacio-AA">
                                                                    <button type="submit" class="neonbottonlanding btn btn-primary" style="width: auto; height: auto; font-size: 14px;" id="save2">Guardar Datos</button> 
                                                                    
                                                                </div>
                                                                
                                                            </div>   
                                                        </div>
                                                
                                            </div>
                                        </div>
                                
                                </section>
                            </div>


                            <!--Form cambio Contraseña-->
                            <div class="container">
                                <section class="fondo-null espacio-admin" id="cambioFontContra">
                                        <div class="container">
                                            <div class="col mx-1  pt-3 mb-1 border neontabla">
                                                    <h2 class= "neones"><i class="fa-solid fa-key"></i> Cambio Cantraseña </h2>
                                                        <div class="container">
                                                        <div class="row">
                                                            <div class=" my-auto mx-auto">          
                                                                
                                                            <form id="formcontra">
                                                                <div class="form-group">
                                                                    <label style="color: white;">Contraseña actual: </label>
                                                                    <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3" style="font-style: italic;" placeholder="Ingresa tu contraseña actual" type="password" id="pass" required>
                                                                </div>

                                                                <div id="respcontra" class="m-1 d-none">

                                                                    <label style="color: white;">Nueva contraseña:</label>
                                                                    <input class="form-control input-lg" placeholder="Ingresa la nueva contraseña" style="font-style: italic;" type="password" id="passnew1" required>
                                                                    <label style="color: white;">Repetir nueva contraseña:</label>
                                                                    <input class="form-control input-lg" placeholder="Repita la nueva contraseña" style="font-style: italic;" type="password"  id="passnew2" required>

                                                                    <div id="mensaje"></div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" id="btncerrar">Cerrar</button>
                                                                        <button type="submit" class="btn btn-primary" id="save">Guardar Contraseña</button>
                                                                    </div>
                                                                </div>
   
                                                            </form> 
                                                            </div>   
                                                        </div>
                                                
                                            </div>
                                        </div>
                                </section>
                            </div>
                            <div class="container" style="display: flex; align-items: center;">
                                <section class="fondo-null espacio-admin" id="verificacionCorreo">
                              <!-- principal registro  -->
                              <div class="row espacio-admin">
                                <div class="col-sm-12 border neontabla">
                                    <button class="btn btn-primary" style="margin-left: 300px; margin-right: 300px; margin-top: 10px; margin-bottom: 10px;">Recibir un correo</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
        </div>

    <br>


<!--Fin Cambio Contraseña-->


    
</div>
</section>
<script src="build/js/ajax/ajax.administrar.js"></script>
<script src="build/js/ajax/ajax.cambiarContra.js"></script>
<script src="build/js/ajax/ajax.histfactura.js"></script>
