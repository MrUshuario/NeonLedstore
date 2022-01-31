// var inicio = function () {

// 	alert('');// }

$(document).ready(function() { 

     // listener keyup al campo de texto con clase cantidad

	$(".cantidad").keyup(function(e){

		// validamos que el campo no esté vacío

		if($(this).val()!=''){

			// cuando el objeto evento tenga valor 13 (soltar la tecla enter)

			if(e.keyCode==13){

				// capturo los data-atributos del input cantidad

				var id=$(this).attr('data-id');

				var precio=$(this).attr('data-precio');

				// obtenemos el valor del input

				var cantidad=$(this).val();

				// le cambiamos dinámicamente el contenido al cajón con la clase subtotal

				// buscamos vía dom, tiene un nivel superior al input dónde estamos

				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));

				// método post de ajax

				// trabajamos con el archiv modificardatos.php

				$.post('./js/modificardatos.php',{

					// le enviamos parámetros con las variables capturadas y el valor cantidad

					Id:id,

					Precio:precio,

					Cantidad:cantidad

					// una función recibe un objeto evento (el echo enviado)

					// capturamos el valor enviado y lo escribimos en la caja con la id total

				},function(e){

						$("#total").text('Total: '+e);

				});

			}

		}

	});

 });

$(document).on('ready',inicio);
