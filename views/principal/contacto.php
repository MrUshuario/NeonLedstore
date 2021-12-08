
<div class="contacto bg-black container-fluid">
    <div class="row">
        <img src="/build/img/contacto/jovenLuzMovil.webp" srcset="/build/img/contacto/jovenLuzMovil.webp 420w, /build/img/contacto/jovenLuzMovil.webp 1095w" alt="jovenLuz" class="fondoContacto position-absolute p-0">
    </div>
    <div class="container">
        <section class="row pb-5">
            <form id="formContact" method="POST">
                <div class="container">
                    <div class="row text-white mx-1 mx-sm-5 pt-3 mb-2 d-flex justify-content-end">
                        <div class="formulario col-12 col-sm-12 col-lg-5 p-5 border neontabla">
                            <h2 class="neones">Contáctanos</h2>
                            <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="nombre" id="nombre" placeholder="Nombre" >
                            <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" name="correo" id="correo" placeholder="Correo" >
                            <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="number" name="telefono" id="telefono" pattern="[0-9]{9,12}" placeholder="N° de celular" >
                            <input class="p-2 input-contact border-0 neoninput border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="pregunta" id="pregunta" placeholder="Mensaje" >
                            <button class="button-contact btn m-2 mx-auto d-block neonbotton neontabla" name="enviar" id="enviar">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<script src="build/js/ajax.contacto.js"></script>