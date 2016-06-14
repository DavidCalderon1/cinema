@extends('layouts.admin')
	@section('content')
		@include('genero.modal')
		<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
			<strong> Genero Actualizado Correctamente.</strong>
		</div>
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Operaciones</th>
			</thead>
			<tbody id="datos">
				
			</tbody>
		</table>
		
	@endsection

	<!--de esta manera se agregan los script de cada formulario cuando sea necesario y no desde el inicio, este js se cargara en la section del layout admin.blade.php que tiene el mismo nombre-->
	@section('scripts')
		{!!Html::script('js/script2.js')!!}
	@endsection