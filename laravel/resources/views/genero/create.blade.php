@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
		{!!Form::open()!!}
			<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
				<strong> Genero Agregado Correctamente.</strong>
			</div>
			<div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
				<strong id="msj"></strong>
			</div>
			<!--laravel genera y requiere un token para verificar que las peticiones ajax no son malintencionadas-->
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			@include('genero.form.genero')
			{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
		{!!Form::close()!!}
	@endsection
	
	<!--de esta manera se agregan los script de cada formulario cuando sea necesario y no desde el inicio, este js se cargara en la section del layout admin.blade.php que tiene el mismo nombre-->
	@section('scripts')
		{!!Html::script('js/script.js')!!}
	@endsection