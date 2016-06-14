<!--  se recibe la variable enviada del metodo store del controlador UsuarioController -->
<?php $message=Session::get('message'); ?>

<!-- si existe la variable message muestra el mensaje en un recuadro de alerta -->
@if( Session::has('message') )
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  {{Session::get('message')}}
	</div>
@endif