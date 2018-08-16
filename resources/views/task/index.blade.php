@extends('layouts.app')

@section('content')

    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <h1 class="text-white">Tasks</h1>
            @if ( auth()->user()->isAdmin() )
            {!! \Form::open(['route' => ['tasks.create', 'id' => '0'], 'method' => 'POST']) !!}
            {!! \Form::button('<i class="fas fa-plus"></i> Add Task', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}
            {!! \Form::close() !!}
            @endif
        </div>
        @foreach($tasks as $task)
        <div class="task-background">
            <div class="m-0" style="border:1px solid #5d6975; margin:{{$margin = 0}};">
                <div class="row bg-dark text-white justify-content-between p-0 m-0 p-2">
                    <div class="drop-down" id="btn-4"><i class="fas fa-angle-down btn"></i></div>
                    <span style="width:20%;">{{$task->title}}</span>
                    <span style="width:30px;">{{$task->priority}}/10</span>
                    <span style="width:10%;">est. {{$task->estimation}}h</span>
                    <div class="progress" style="width:20%; height:25px;">
                        <div class="progress-bar" role="progressbar" style="width: {{$task->progress}}%;" aria-valuenow="{{$task->progress}}" aria-valuemin="0" aria-valuemax="100">{{$task->progress}}%</div>
                    </div>

                    <div>
                        <div class="btn btn-primary btn-sm">{{ $task->status->status_name }}</div>
                    </div>

                    <span class="text-white">{{ $task->end_date }}</span>
                    <div>
                        <a href="{{ route('tasks.show', [$task]) }}" class="btn btn-primary btn-sm">Show</a>
                    </div>
                    <div>
                        {!! \Form::open(['route' => ['tasks.create', 'id' => $task->id], 'method' => 'POST']) !!}
                        {!! \Form::button('<i class="fas fa-plus"></i>', ['type' => 'submit', 'class' => 'btn btn-sm badge-success']) !!}
                        {!! \Form::close() !!}
                    </div>
                    <div>
                        <a href="{{ route('tasks.edit', [$task]) }}"  class="btn btn-sm btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                    <div>
                        {!! \Form::open(['route' => ['tasks.destroy', $task], 'method' => 'delete']) !!}
                        {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                        {!! \Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="task-dropped">
                @if($task->children->count() > 0)
                    @foreach($task->children as $subtask)
                        @include('task.subtask', ['subtask' => $subtask])
                    @endforeach
                @endif
            </div>
        </div>
        @endforeach

    </div>

@endsection

@section('js')

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            var rotation = 0;

            jQuery.fn.rotate = function(degrees) {
                $(this).css({'transform' : 'rotate('+ degrees +'deg)'});
                return $(this);
            };
           $('.drop-down').click(function(){

               rotation += 180;
               $(this).rotate(rotation);

               $(this).parent().parent().parent().children('.task-dropped').toggle("medium");
           });
        });
    </script>

@endsection