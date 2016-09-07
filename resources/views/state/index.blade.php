@extends('layouts.master')
	@section('content')
		{!!Form::select('state',$states, null,['id' => 'state']) !!}
		{!!Form::select('town',['placeholder' => 'Seleccione un municipio'], null, ['id' => 'town'])!!}
	@endsection	