@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            {{ Form::model($issue, ['route' => ['issues.update', $issue], 'method' => 'put']) }}

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

            <div class="form-group">
                <label for="client_id">Client:</label>
                <select name="client_id" class="custom-select" id="client_id">
                    @foreach($clients as $client)
                        <option @if($issue->client_id == $client->id) selected @endif value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="users[]">Attach users:</label>
                <select name="users[]" class="custom-select" id="users[]" multiple>
                    @foreach($users as $user)
                        <option @if($issue->users->has($user->id)) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            {!! \Form::submit('Submit', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection