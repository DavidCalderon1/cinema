@extends('layouts.principal')
	@section('content')
	@include('alerts.success')
		<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="/"><img src="/images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<!---contact-->
		<div class="main-contact">
			 <h3 class="head">CONTACT</h3>
			 <p>WE'RE ALWAYS HERE TO HELP YOU</p>
			 <div class="contact-form">
				{!!Form::open(['url' => '/password/reset'])!!}
					<div class="col-md-6 contact-left">
						{!!Form::hidden('token',$token,null)!!}

						{!!Form::text('email',null,['value' => "{{old('email')}}",'placeholder' => 'Email'] )!!}
						
						{!! Form::password('password', array('placeholder'=>'Contraseña') ) !!}
						{!! Form::password('password_confirmation',['placeholder' => 'Confirmar Contraseña']) !!}
					</div>
					
					{!!Form::submit('Restablecer contraseña')!!}
				 {!!Form::close()!!}
			 </div>
		</div>
	@endsection	