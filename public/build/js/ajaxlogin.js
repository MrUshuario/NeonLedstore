$(document).ready(function(){
    $("#formLogin").submit(e => {
        e.preventDefault();
        const data = {
            user: $('#user').val(),
            pass: $('#pass').val()
            //role: $('#role').val()
        }
        
        // URL donde se ejecutara la verificacion
        const url="/login/verificar";

        // Primera forma de hacer POST en Ajax
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function(response){
                let json = JSON.parse(response);
            console.log(json.mensaje)
            const status = json.STATUS;
                if(status == 1){
                    swal({
                        title: json.mensaje,
                        icon: "success"
                      }).then(()=>{
                        window.location.href ="/dashboard"; 
                      });                      
                }else{
                    swal({
                        title: json.mensaje,
                        icon: "error",
                    });
                }
            }
        });
        /*
        Segunda forma de hacer un POST en Ajax
        $.post(url, data, (response)=>{
            //window.location.href="http://localhost:3001/dashboard";
            let json = JSON.parse(response);
            console.log(json.mensaje)
            setTimeout(()=>{
                alert(`${json.mensaje}`);
                window.location.href="http://localhost:3001/dashboard";
            },5000);
        });*/
    })
})
