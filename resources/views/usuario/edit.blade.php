@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
		<!-- agregar las instrucciones para mostrar el boton de Actualizar, el metodo PUT es el encargado de actualizar un recurso -->
		{!!Form::model($user,['route'=> ['usuario.update',$user],'method'=>'PUT'])!!}
			@include('usuario.forms.user')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		
		<!-- agregar las instrucciones para mostrar el boton de Eliminar debajo del de Actualizar, el metodo DELETE es el encargado de eliminar un recurso -->
		{!!Form::open(['route'=> ['usuario.destroy',$user],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection