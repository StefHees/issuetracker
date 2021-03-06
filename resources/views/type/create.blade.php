@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <h1 class="text-black">Type</h1>
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            <h1 class="text-black">Create Type</h1>
            {!! \Form::open(['route' => 'types.store']) !!}

            <div class="form-group">
                <label for="title">Title:</label>
                {!! \Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            {!! \Form::submit('Add Type', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection