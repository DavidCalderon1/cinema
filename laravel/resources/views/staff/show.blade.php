@extends('layouts.app')

@section('content')
    @include('staff.show_fields')

    <div class="form-group">
           <a href="{!! route('staff.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
