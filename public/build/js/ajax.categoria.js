const contenedorTabla = document.querySelector("#tablacategoria tbody");
const contentImg = document.querySelector("#img");

$(document).ready(function(){
    $("#formCategoria").submit(e=>{
        e.preventDefault();
        //Variables del formulario
        let nombre = $("#cat_nombre").val().trim();
        let imagen = $("#cat_imagen")[0].files[0];
        let link = $("#cat_link").val().trim();
        let estado = $("#cat_estado").val().trim();

        if( imagen == undefined || nombre === "" || link === "" || estado === "null"){
            swal({
                title:"Completar los campos requeridos",
                icon:"error"
            })
        }else {
            const formData = new FormData();

            let id = $("#id").val();
            if(id == ""){
                formData.append("cat_nombre",nombre);
                formData.append("cat_imagen",imagen);
                formData.append("cat_link",link);
                formData.append("cat_estado",estado);

                $.ajax({
                    url: "/categoria/crear",
                    data:formData,
                    type: 'POST',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success: function(resp){
                        let json = JSON.parse(resp);
                        console.log(json);

                        if(json.res){
                            cierreModel("modalCategoria");
                            llenarTabla();
                            swal({
                                title:"Registro completo",
                                icon:"success"
                            })
                            
                        }else{
                            swal({
                                title:"Error en el registro",
                                icon:"error"
                            })
                        }
                    }
                })
            }else{
                //=======================================
                formData.append("cat_nombre",nombre);
                formData.append("cat_imagen",imagen);
                formData.append("cat_link",link);
                formData.append("cat_estado",estado);
                formData.append("id",id);
                $.ajax({
                    url: "/categoria/actualizar",
                    data: formData,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    success: function(response){
                        let json = JSON.parse(response);
                        const {resp, cat} = json;
                        if(resp){
                            cierreModel("modalCategoria");
                            llenarTabla();
                        }
                    }
                })
            }
        }

    })

    $(document).on('click','#btnEstado', e =>{
        let id = e.target.dataset.id;
        let value = e.target.value;
        const data = { 
            id: id,
            cat_estado: value
        }
        $.ajax({
            url:"/categoria/estado",
            type:'POST',
            data:data,
            success: resp =>{
                let json = JSON.parse(resp);
                console.log(json.estado);
                e.target.value=json.estado;
                if(json.estado == "ACTIVO"){
                    e.target.classList.remove('btn-danger');
                    e.target.classList.add('btn-success');
                }else {
                    e.target.classList.remove('btn-success');
                    e.target.classList.add('btn-danger');
                }
            }
        });
    })

    $(document).on('click','#edit',function(e){
        let id = e.target.dataset.idcategoria;
        const data ={
            id:id 
        }
        $.ajax({
            url: "/categoria/getCategoria",
            data: data,
            type: 'POST',
            success: function(e){
                let json = JSON.parse(e);

                const {id, cat_nombre, cat_imagen, cat_link, cat_estado} = json.resp;

                const idC = document.querySelector('#id');
                const nombre = document.querySelector('#cat_nombre');
                const link = document.querySelector('#cat_link');
                const estado = document.querySelector("#cat_estado");

                idC.value = id;
                nombre.value = cat_nombre;
                link.value = cat_link;
                estado.value = cat_estado;

                // Poner las imagenes
                const img = document.createElement('img');
                img.src=`/imagenes/${cat_imagen}`;
                img.alt= cat_nombre;
                img.width= 150;
                img.height= 150;
                contentImg.appendChild(img);
            }
        })
    })

    $(document).on('click',"#delete",function(e){
        swal({
            title: "Estas seguro de eliminar esta categoria ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then(ef =>{
              if(ef){
                  const id = e.target.dataset.idcategoria;
                  console.log(id)
                  $.ajax({
                      type: "POST",
                      url:"/categoria/eliminar",
                      data: {id:id},
                      success: function(ef){
                        let json = JSON.parse(ef);
                        if(json.res){
                            swal({
                                title: 'Se elimino correctamente la categoria',
                                icon: 'success'
                            })
                            llenarTabla();
                        }else {
                            swal({
                                title:'No se pudo eliminar, al estar alineado con otro datos',
                                icon:'error'
                            });
                        }
                      }
                  })
              }
          })
    })
})

function limpiarHtml(){
    while(contenedorTabla.firstChild){
        contenedorTabla.removeChild(contenedorTabla.firstChild);
    }
}

function llenarTabla(){
    $.ajax({
        url:"/categoria/listar",
        type:'GET',
        success: resp => {
            let json = JSON.parse(resp);
            const listas = json.listas;
            limpiarHtml();
            listas.forEach(lista => {
                const { id, cat_nombre, cat_imagen, cat_link, cat_estado } = lista;
                
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td><img width="160px" src="imagenes/${cat_imagen}" id="imgrow"></td>
                    <td>${cat_nombre}</td>
                    <td>${cat_link}</td>
                    <td>
                        <input type="button" id="btnEstado" class="btn ${cat_estado.toLowerCase() == 'activo' ? 'btn-success':'btn-danger'}" data-id="${id}" value="${cat_estado.toUpperCase()}">
                    </td>
                    <td>
                    <button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-idcategoria=${id} data-bs-target="#modalCategoria" >Edit</button>
                    <button class="btn btn-danger" id="delete" data-idcategoria=${id}>Delete</button>
                    </td>
                `;

                contenedorTabla.appendChild(row);
            });
        }
    });
}

function cierreModel(idModel){
    const modal = document.querySelector(`#${idModel}`);
    const modalfondo = document.querySelector(".modal-backdrop.fade");
    modal.classList.add('none');
    modal.classList.remove('show')
    modalfondo.classList.remove('show');
    $("#formCategoria").trigger('reset');
}

function resetearCerrar(){
    const cerrar = document.querySelector("#cerrar");
    const btnRegistrar = document.querySelector("#model-register");
    cerrar.addEventListener('click',()=>{
        $("#formCategoria").trigger('reset');
    });

    btnRegistrar.addEventListener('click',()=>{
        $("#formCategoria").trigger('reset');
        $("#id").val("");
        contentImg.remove(contentImg.firstChild);
    })
}

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
                url: "/categoria/buscar",
                data:data,
                type: "POST",
                success: (response) => {
                    let json = JSON.parse(response);
                    console.log(json);
                    const lists = json.list;
                    limpiarHtml();
                    if(lists.length != 0){
                        lists.forEach(list => {
                            const { cat_nombre, cat_imagen, cat_estado, cat_link, id } = list;
                            const row = document.createElement('tr');
                            //Importante en DataTable ya te inclue los TR solo pongan los td
                            row.innerHTML = `
                            <td><img width="160px" src="imagenes/${cat_imagen}" id="imgrow"></td>
                            <td>${cat_nombre}</td>
                            <td>${cat_link}</td>
                            <td>
                                <input type="button" id="btnEstado" class="btn ${cat_estado.toLowerCase() == 'activo' ? 'btn-success':'btn-danger'}" data-id="${id}" value="${cat_estado.toUpperCase()}">
                            </td>
                            <td>
                            <button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-idcategoria=${id} data-bs-target="#modalCategoria" >Edit</button>
                            <button class="btn btn-danger" id="delete" data-idcategoria=${id}>Delete</button>
                            </td>
                            `;
                            
                            contenedorTabla.appendChild(row);
                        });
                    }else {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                            <td colspan="5" class="text-center">
                                No se encontraron resultado
                            </td>
                        `;
                        contenedorTabla.appendChild(row);
                    }
                }
            });
        }
    });
}
llenarTabla()
resetearCerrar()
buscarNombre()