const contenedorTabla = document.querySelector("#tablacategoria tbody");

$(document).ready(function(){
    $("#formCategoria").submit(e=>{
        e.preventDefault();
        //Variables del formulario
        let nombre = $("#cat_nombre").val().trim();
        let imagen = $("#cat_imagen")[0].files[0];
        let link = $("#cat_link").val().trim();
        let estado = $("#cat_estado").val().trim();

        if(nombre === "" || link === "" || estado === "null"){
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
                // Id de actualizar
                // let id = document.querySelector("").value;

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
                        // let json = JSON.parse(response);
                        // const {resp} = json;
                        // if(resp){
                        //     llenarTabla();
                        // }
                        // console.log(json)
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
                if(json.estado == "ACTIVO"){
                    e.target.value=json.estado;
                    e.target.classList.remove('btn-danger');
                    e.target.classList.add('btn-success');
                }else {
                    e.target.value=json.estado;
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
                const inputImg = document.querySelector("#img");
                const link = document.querySelector('#cat_link');
                const estado = document.querySelector("#cat_estado");

                idC.value = id;
                nombre.value = cat_nombre;
                link.value = cat_link;
                estado.value = cat_estado;

                // Poner las imagenes
                const img = document.querySelector('img');
                img.src=`/imagenes/${cat_imagen}`;
                img.alt= cat_nombre;
                img.width= 150;
                img.height= 150;
                inputImg.appendChild(img);
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
                    <td><img width="160px" src="imagenes/${cat_imagen}"></td>
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

llenarTabla()