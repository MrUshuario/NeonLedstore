

$(document).ready(function () {
tableColor();
  cleanForm();
  saveColor();
});

function tableColor() {
  const table = $("#tablacolor").DataTable({
    "destroy":true,
    "ajax": {
      "method": "GET",
      "url": "/color/listar"
    },
    "columns": [
      { "data": "nombre" },
      { "data": "rgb" },
      {
        "defaultContent": 
        `<button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-bs-target="#modalColor">Edit</button>
         <button class="btn btn-danger" id="delete">Delete</button>`,
      }
    ]
  });

  obtenerData("#tablacolor tbody", table);
}

function obtenerData(tbody, table) {
  $(tbody).on("click", "#edit", function () {
    clean();
    var data = table.row($(this).parents("tr")).data();

    console.log(data);
    $("#id").val(data.id);
    $("#nombreColor").val(data.nombre);
    $("#rgb").val(data.rgb);

    $("#title").text("Actualizar Color");
    $("#save").text("Actualizar");
  });
}

function clean() {
  $("#id").val("");
  $("#nombreColor").val("");
  $("#rgb").val("");

  $("#title").text("Guardar Color");
  $("#save").text("Guardar");
}

function cleanForm() {
  $(document).on("click", "#model-register", function () {
    clean();
  });
}

function saveColor() {
  $("#formColor").submit(function (e) {
    e.preventDefault();

    let rgb = $("#rgb").val();
    let nombre = $("#nombreColor").val();
    let id = $("#id").val();

    if (id == "") {
        const data = {
            nombre: nombre,
            rgb: rgb
          };
        createColor(data);
      
    } else {
        const data = {
            id: id,
            nombre: nombre,
            rgb: rgb
          };
      updateColor(data);
    }
    tableColor();
  });
}

function createColor(data) {
  $.ajax({
    url: "/color/guardar",
    data: data,
    type: "POST",
    success: function (response) {
      let json = JSON.parse(response);
      let lista = json.listas;
      switch (json.STATUS) {
        case 1:
          $("#modalColor").modal("hide");
          swal({
            title: json.mensaje,
            icon: "success",
          });
          break;
        case 2:
          swal({
            title: json.mensaje,
            icon: "error",
          });
          break;
        case 3:
          swal({
            title: json.mensaje,
            icon: "error",
          });
          break;
      }
      
    },
  });
}

function updateColor(data) {
  $.ajax({
    url: "/color/editar",
    data: data,
    type: "POST",
    success: function (response) {
      let json = JSON.parse(response);
      console.log(json);
      if (json) {
        $("#modalColor").modal("hide");
        tableAll();
        swal({
          title: "Se edito correctamente",
          icon: "success",
        });
      } else {
        swal({
          title: "Error al editar",
          icon: "error",
        });
      }
    },
  });
}

function deleteColor() {}

/*
//
$(document).ready(function(){
    $("#formColor").submit(e => {
        e.preventDefault();
        //Variables del formulario
        let rgb =  $('#rgb').val();
        let nombre = $('#nombreColor').val().toLowerCase().trim();
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
                $("#nombreColor").val(nombre);
                $("#rgb").val(rgb);

                const idc = document.querySelector("#id");
                const nom = document.querySelector("#nombreColor");
                const rg = document.querySelector("#rgb");
                
                nom.value = nombre;
                nom.textContent = nombre;
                rg.textContent = rgb; 
            }
            
        });
        
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
                        colorPaginacionTabla();
                    }
                })
              swal("Color eliminado correctamente!", {
                icon: "success",
              });
            }
          });
    })
})
*/
