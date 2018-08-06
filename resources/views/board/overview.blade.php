@extends('layouts.app')

@section('content')
    <div class="col-11 m-auto">
        <h1>Dashboard</h1>

        <div class="row">
            @foreach($statuses as $status)
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{$status->status_name}}
                        </div>
                        @foreach($status->tasks as $task)
                        <div class="card-body">
                            <h5 class="card-title">{{$task->title}}</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                            @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection