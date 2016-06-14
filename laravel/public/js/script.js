$("#registro").click(function(){
	var dato = $("#genre").val();
	var route = "/genero";
	var token = $("#token").val();
	
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{genre: dato},

		success:function(){
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			//colocar la respuesta en json en el #msj
			$("#msj").html(msj.responseJSON.genre);
			$("#msj-error").fadeIn();
		}
	});
});

//de esta manera se asegura la accion al presionar el enter, debido a que no estaba funcionando bien y salian errores
$("#registro").parent('form').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    $('#registro').click();
    return false;  
  }
}).submit(function (event) {
    $('#registro').click();
	event.preventDefault();
    return false;  
});