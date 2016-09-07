@extends('layouts.admin')
	@include('alerts.success');
	@section('content')
		<div class="users">
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Operaciones</th>
				</thead>
				<!-- recorre los datos de la variable recibida y muestra el name y email de la tabla users-->
				@foreach($users as $user)
				<tbody>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
						{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'] )!!}
					</td>
				</tbody>
				@endforeach
			</table>

			{!! $users->links() !!}
		</div>
	@endsection
	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection