const contenedor = document.querySelector("#tablacolor tbody");

// cerrar el modal con el id
    function cierreModel(idModel){
        const modal = document.querySelector(`#${idModel}`);
        const modalfondo = document.querySelector(".modal-backdrop.fade");
        modal.classList.add('none');
        modal.classList.remove('show')
        modalfondo.classList.remove('show');
        $("#formColor").trigger('reset');
    }
// limpia el contenedor de la tabla
    function limpiarHtml(){
        while(contenedor.firstChild){
            contenedor.removeChild(contenedor.firstChild);
        }
    }
// Llena la tabla con datos ya guardados dentro de la base de datos
    function llenarTabla(){
        $.ajax({
            url: "/color/listar",
            type: 'GET',
            success: (response)=>{
                const json = JSON.parse(response);
                const listar = json.listado;
                limpiarHtml();
                listar.forEach(lista=>{
                    const { nombre, rgb, id } = lista;
                    const row = document.createElement('tr');
                    //Importante en DataTable ya te inclue los TR solo pongan los td
                    row.innerHTML = `
                        <td class="col">
                            ${nombre}
                        </td>
                        <td class="col">
                            ${rgb}
                        </td>
                        <td idColor="${id}">
                            <button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-bs-target="#modalColor" >Edit</button>
                            <button class="btn btn-danger" id="delete" data-idcolor=${id}>Delete</button>
                        </td>
                    `;
                    contenedor.appendChild(row);
                });
                
            }
        })
    }
// Buscar el nombre del color 
    function buscarNombre(){
        $("#buscarnombre").keyup(function (){
            let inputNombre = $("#buscarnombre").val();
            if( inputNombre === ""){
                llenarTabla();
            }else {
                const data = {
                    nombre : inputNombre
                }
                $.ajax({
                    url: "/color/buscar",
                    data:data,
                    type: "POST",
                    success: (response) => {
                        let json = JSON.parse(response);
                        const lists = json.resp;
                        limpiarHtml();
                        if(lists.length != 0){
                            lists.forEach(list => {
                                const { nombre, rgb, id } = list;
                                const row = document.createElement('tr');
                                //Importante en DataTable ya te inclue los TR solo pongan los td
                                row.innerHTML = `
                                    <td class="col">
                                        ${nombre}
                                    </td>
                                    <td class="col">
                                        ${rgb}
                                    </td>
                                    <td idColor="${id}">
                                        <button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-bs-target="#modalColor" >Edit</button>
                                        <button class="btn btn-danger" id="delete" >Delete</button>
                                    </td>
                                `;
                                
                                contenedor.appendChild(row);
                            });
                        }else {
                            const row = document.createElement("tr");
                            row.innerHTML = `
                                <td colspan="3" class="text-center">
                                    No se encontraron resultado
                                </td>
                            `;
                            contenedor.appendChild(row);
                        }
                    }
                });
            }
        });
    }
/*  resetea los campos al abrir el modal para registrar y al cerrar,
 evitando que se quede aun los datos ingresados al agregar o editar */
    function resetearCerrar(){
        const cerrar = document.querySelector("#cerrar");
        const btnRegistrar = document.querySelector("#model-register");
        cerrar.addEventListener('click',()=>{
            $("#formColor").trigger('reset');
        });

        btnRegistrar.addEventListener('click',()=>{
            $("#formColor").trigger('reset');
            $("#id").val("");
        })
    }
    
buscarNombre();
llenarTabla();
resetearCerrar();

//
$(document).ready(function(){
    $("#formColor").submit(e => {
        e.preventDefault();
        //Variables del formulario
        let rgb =  $('#rgb').val();
        let nombre = $('#nombre').val().toLowerCase().trim();
        let id = $('#id').val();
        const modal = document.querySelector('#save');
        modal.textContent = "Guardar";
        if(rgb !== "" && nombre !== ""){
            // URL donde se ejecutara la verificacion

            if(id !== ""){
                const data = {
                    rgb: rgb,
                    nombre: nombre,
                    id:id
                }
                $.ajax({
                    url: "/color/editar",
                    data: data,
                    type: 'POST',
                    success: function(response){
                        let json = JSON.parse(response);
                        //let lista = json.listas;
                        console.log(json);
                        if(json){
                            swal({
                                title: "Se edito correctamente",
                                icon: "success"
                            });
                            cierreModel('modalColor');
                            llenarTabla();
                        }else {
                            swal({
                                title: "Error al editar",
                                icon: "error"
                            });
                        }
                    }
                });
            }else {
                const data = {
                    rgb: rgb,
                    nombre: nombre
                }
                // Primera forma de hacer POST en Ajax
                $.ajax({
                    url: "/color/guardar",
                    data: data,
                    type: 'POST',
                    success: function(response){
                        let json = JSON.parse(response);
                        let lista = json.listas;
                        console.log(lista);
                        switch (json.STATUS) {
                            case 1:
                                swal({
                                    title: json.mensaje,
                                    icon: "success"
                                });
                                cierreModel('modalColor');
                                llenarTabla();
                                // tablaColor.row.add(lista).draw();
                                break;
                            case 2:
                                swal({
                                    title: json.mensaje,
                                    icon: "error"
                                });
                                break;
                            case 3:
                                swal({
                                    title: json.mensaje,
                                    icon: "error"
                                });
                                break;
                        }
                    }
                });
            }
        }else {
            swal({
                title: "Complete los campos requeridos",
                icon: "error"
            });
        }
    });

    $(document).on('click','#edit',e=>{
        const element = $(this)[0].activeElement.parentElement;
        const id = $(element).attr('idColor');
        const modal = document.querySelector('#save');
        modal.textContent = "Editar";
        const data = {
            id: id
        }
        $.ajax({
            url:"/color/getColor",
            type:"POST",
            data:data,
            success: (response)=>{
                let json = JSON.parse(response);
                const {id, nombre, rgb} = json.color;
                $("#id").val(id);
                $("#nombre").val(nombre);
                $("#rgb").val(rgb);

                const idc = document.querySelector("#id");
                const nom = document.querySelector("#nombre");
                const rg = document.querySelector("#rgb");
                
                nom.textContent = nombre;
                rg.textContent = rgb; 
            }
            
        });
        e.preventDefault();
        
    });

    $(document).on('click','#delete', (e)=>{
        swal({
            title: "Estas seguro de eliminar este color ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((d) => {
            if (d) {
                const id = document.querySelector('#delete').dataset.idcolor;
                console.log(id);
                $.ajax({
                    url: '/color/eliminar',
                    data: {id:id},
                    type: 'POST',
                    success: (resp)=>{
                        console.log(resp)
                        llenarTabla();
                    }
                })
              swal("Color eliminado correctamente!", {
                icon: "success",
              });
            }
          });
    })
})