@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4 bg-gray">
            {!! \Form::open(['route' => 'tasks.store']) !!}

            <div class="form-group">
                <label for="issue_id">Issue:</label>
                <select name="issue_id" class="custom-select" id="issue_id" required>
                    @foreach($issues as $issue)
                        <option value="{{$issue->id}}">{{$issue->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="issue_id">Status:</label>
                <select name="status_id" class="custom-select" id="status_id" required>
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->status_name}}</option>
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
                <label for="example-time-input" class="form-label">Estimated hours:</label>
                <input name="estimation" class="form-control" type="time" step=900 value="10:00" id="example-time-input" required>
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