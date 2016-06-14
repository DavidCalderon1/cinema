$(document).ready(function(){
	Carga();
});

function Carga(){
	var tablaDatos = $("#datos");
	var route = "/genero";

	$("#datos").empty();
	//mediante get se obtiene la respuesta con todos los generos
	$.get(route, function(res){
		$(res).each(function(key,value){
			//inserta los datos recibidos con formato, en la opcion Editar y Eliminar se agregan los id para poder ejecutar dichas acciones
			tablaDatos.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
		});
	});
}

//se obtiene el id del genero del imput oculto de la ventana modal
function Eliminar(btn){
	var route = "/genero/"+btn.value+"";
	var token = $("#token").val();
	
	//se envia la peticion mediante el metodo DELETE con el id del genero
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			Carga();
			$("#msj-success").fadeIn();
		}
	});
}
//permite ver el genero que se quiere editar
function Mostrar(btn){
	var route = "/genero/"+btn.value+"/edit";
	//asigna a los imput ocultos #genre y #id los valores recibidos, estos imput estan en la sub-vista modal.blade.php
	$.get(route, function(res){
		$("#genre").val(res.genre);
		$("#id").val(res.id);
	});
}

//se obtiene el id y el genre del genero de los imput ocultos de la ventana modal
$("#actualizar").click(function(){
	var value = $("#id").val();
	var dato = $("#genre").val();
	var route = "/genero/"+value+"";
	var token = $("#token").val();
	
	//se envian los datos a la url /genero/[id] por el metodo PUT
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {genre: dato},
		success: function(){
			Carga();
			$("#myModal").modal('toggle');
			$("#msj-success").fadeIn();
		}
	});
});