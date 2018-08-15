@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <h1 class="text-black">Edit Type</h1>
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            {{ Form::model($type, ['route' => ['types.update', $type], 'method' => 'put']) }}

            <div class="form-group">
                <label for="title">Title:</label>
                {!! \Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            {!! \Form::submit('Update', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection