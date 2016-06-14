
$(document).on('click','.pagination a',function(e){
	//prevenir que ese evento desencadene algo
    e.preventDefault();
	//capturar el atributo href y la divide, mostrando lo que esta despues de la cadena 'page='
    var page = $(this).attr('href').split('page=')[1];
    var route = "/usuario";
    $.ajax({
        url: route,
        data: {page: page},
        type: 'GET',
        dataType: 'json',
        success: function(data){
            $(".users").html(data);
        }
    });
});
