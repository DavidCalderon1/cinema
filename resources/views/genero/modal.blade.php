<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Genero</h4>
      </div>
      <div class="modal-body">
		<!--el imput que guarda el token que genera laravel para las peticiones ajax-->
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<!--el imput que guarda el id correspondiente al genero-->
		<input type="hidden" id="id">
		<!--se incorpora un sub-vista para crear el genero-->
        @include('genero.form.genero')
      </div>
      <div class="modal-footer">
	  <!--link para actualizar el genero-->
      {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-primary'], $secure = null)!!}
      </div>
    </div>
  </div>
</div>