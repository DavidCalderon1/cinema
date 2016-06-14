<!-- Pruebauno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pruebauno', 'Pruebauno:') !!}
    {!! Form::text('pruebauno', null, ['class' => 'form-control']) !!}
</div>

<!-- Pruebados Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pruebados', 'Pruebados:') !!}
    {!! Form::text('pruebados', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('staff.index') !!}" class="btn btn-default">Cancel</a>
</div>
