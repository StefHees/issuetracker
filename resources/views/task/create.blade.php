@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4 bg-gray">
            {!! \Form::open(['route' => 'tasks.store']) !!}

            <div class="form-group">
                <label for="task_id">Parent Task:</label>
                <select name="task_id" class="custom-select" id="task_id">
                    <option >None</option>
                    @foreach($tasks as $task)
                        <option value="{{$task->id}}">{{$task->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status_id">Status:</label>
                <select name="status_id" class="custom-select" id="status_id" required>
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->status_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_id">Type:</label>
                <select name="type_id" class="custom-select" id="type_id" required>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="type_id">Client:</label>
                <select name="client_id" class="custom-select" id="client_id">
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                {!! \Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                {!! \Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="name">Start date:</label>
                {{ Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label for="name">End date:</label>
                {{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label for="estimation" class="form-label">Estimated hours:</label>
                <input name="estimation" class="form-control" type="number" value="10" id="estimation" required>
            </div>

            <div class="form-group">
                <label for="description">Priority:</label>
                {{ Form::selectRange('priority', 1, 10, null, ['class' => 'form-control custom-select']) }}
            </div>

            {!! \Form::submit('Add Task', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection