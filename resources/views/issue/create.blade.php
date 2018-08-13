@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            {!! \Form::open(['route' => 'issues.store']) !!}

            <div class="form-group">
                <label for="title">Title:</label>
                {!! \Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                {!! \Form::text('type', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
            </div>

            @if($task->parentTask->client)
                <p>Client: {{$task->parentTask->client->name}}</p>
                <input type="hidden" name="client_id" value="{{$task->parentTask->client_id}}">

            @else
            <div class="form-group">
                <label for="client_id">Client:</label>
                <select name="client_id" class="custom-select" id="client_id">
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
                <label for="users[]">Employees:</label>
                <select name="users[]" class="custom-select" id="users[]" multiple>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            {!! \Form::submit('Submit', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection