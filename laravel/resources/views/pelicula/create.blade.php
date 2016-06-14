@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
			<!--la propiedad 'files' => true es la que permite enviar archivos -->
		  	{!!Form::open(['route'=>'pelicula.store', 'method'=>'POST','files' => true])!!}
		  		@include('pelicula.forms.pelicula')
				{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
	@endsection