@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit staff</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($staff, ['route' => ['staff.update', $staff->id], 'method' => 'patch']) !!}

            @include('staff.fields')

            {!! Form::close() !!}
        </div>
@endsection