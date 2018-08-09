@extends('layouts.app')

@section('content')

    <th class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <a class="btn btn-success text-white" href="{{ route('tasks.create') }}"><i class="fas fa-plus"></i> Add Task</a>
        </div>
        @if($tasks !== null)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Time Estimation</th>
                    <th scope="col">Status</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Options</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->progress }}</td>
                        <td>{{ $task->start_date }}</td>
                        <td>{{ $task->end_date }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->estimation }}</td>
                        <td>{{ $task->status->status_name }}</td>
                        <td>{{ $task->issue->title }}</td>
                        <th>
                                <a href="{{ route('tasks.edit', [$task]) }}"  class="btn btn-sm btn-primary mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                {!! \Form::open(['route' => ['tasks.destroy', $task], 'method' => 'delete']) !!}
                                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                                {!! \Form::close() !!}

                        </th>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3>You have no clients! :(</h3>
        @endif


    </div>
@endsection