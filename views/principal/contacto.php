<div class="bg-black container-fluid">
    <div class="row">
        <!--<img src="/build/img/contacto/jovenLuzMovil.webp" srcset="/build/img/contacto/jovenLuzMovil.webp 420w, /build/img/contacto/jovenLuzMovil.webp 1095w" alt="jovenLuz" class="fondoContacto position-absolute p-0"> -->
    </div>
    <p type="hidden" class="titulocont"> Contacto </p>
    <div class="container">
        <section class="row pb-3">
            <form class="formContact" id="formContact1" method="POST">
                <div class="container">
                    <div class="row text-white mx-1 mx-sm-5 pt-3 mb-2 d-flex justify-content-end">
                        <div class="formulario col-12 col-sm-12  border neontabla">
                            <h2 class= "neones">Contáctanos</h2>
                                <div class="container">
                                <div class="row">
                                    <div class="col-6 my-auto mx-auto">
                                    <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="hidden" name="contador" id="contador" value=1>
                                    <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="nombre" id="nombre" placeholder="Nombre" required> <br>
                                    <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required> <br>
                                    <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" name="correo" id="correo" placeholder="Correo Electronico" required> <br>
                                    <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="number" name="telefono" id="telefono" pattern="[0-9]{9,12}" placeholder="N° de celular"> <br>
                                    </div>

                                    <div class="col-4 my-auto mx-auto">
                                        
                                            <label for="formConsulta">Opción de Interés:  </label>
                                                <select class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-black" name="consulta" id="consulta" placeholder="Elija Opcion"><br>             
                                                    <option disabled selected="">--- Seleccione ---</option>
                                                    <option id="formHogar" value="formHogar">Hogar</option>
	                                                <option id="formEvento" value="formEvento">Evento</option>
	                                                <option id="formNegocio" value="formNegocio">Negocio</option>
                                                </select>
                                    </div>
                                    <button class="button-contact col-5 btn m-2 mx-auto d-block neonbotton neontabla" type="submit" name="enviar" id="enviar">Enviar</button>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
<!--redes sociales desaparecer en movil-->
    <div class="container">
        <section class="row pb-5">
            
                <div class="container">
                    <div class="row text-white mx-1 mx-sm-5 pt-3 mb-2 d-flex justify-content-end">
                    <div class="col-lg-5 border neontabla redesociales">
                            <h2 class= "neones">Redes Sociales</h2>
                                <div class="container">
                                <div class="row">
                                    <div class="col-12 my-auto mx-auto">
                                   <a href="https://www.instagram.com/neon_led_store/?hl=es"> <i class="fab fa-instagram iconoFont"></i> <input class="p-2 bg-transparent neontextlanding  border-0 border rounded me-1 me-sm-4 my-3 d-block text-white" type="text" name="Instagram" id="Instagram" value="Neon_Led_Store" readonly> </a><br><br><br>
                                   <a href="https://www.facebook.com/Neon-Led-store-100244098454782"> <i class="fab fa-facebook iconoFont"></i> <input class="p-2 bg-transparent neontextlanding  border-0 border  rounded me-1 me-sm-4 my-3 d-block text-white" type="text" name="facebook" id="facebook" value="Neon Led Store" readonly> </a>
                                    </div>
                                </div>
                                </div>
                                </div>
                                
                                <div class="col-lg-2 border rellenocontact">
                                    <h2 class= "neones">relleno</h2>
                                </div>

                        <div class="col-lg-5 border neontabla">
                            <h2 class= "neones">Datos</h2>
                                <div class="container">
                                <div class="row">
                                    <div class="col-12 my-auto mx-auto">
                                    <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="contacto" id="contacto" value="Contacto: 994 078 320" readonly> <br>
                                    <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="gmail" id="gmail" value="email: info.neonledstore@gmail.com" readonly> <br>
                                    <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="dirreción" id="dirreción" value="Jr.paruro 1401 tda 130 CC Paruro" readonly> <br>
                                    </div>
                                </div>
                                </div>
                    </div>
                    </div>
                </div>
           
        </section>
    </div>

</div>

<script src="build/js/ajax/ajax.contacto.js"></script>
