
@foreach($tasks as $task)
<div class="m-0" style="border-left:{{ $border = 0 }}px solid #3490dc">
    <div class="row bg-dark text-white justify-content-between p-0 m-0 p-2">
        <div><i class="fas fa-angle-right btn"></i></div>
        <span style="width:20%;">{{$task->title}}</span>
        <span style="width:20%;">{{$task->priority}}/10</span>
        <span style="width:10%;">est. {{$task->estimation}}h</span>
        <div class="progress" style="width:20%; height:25px;">
            <div class="progress-bar" role="progressbar" style="width: {{$task->progress}}%;" aria-valuenow="{{$task->progress}}" aria-valuemin="0" aria-valuemax="100">{{$task->progress}}%</div>
        </div>

        <div>
            <div class="btn btn-primary btn-sm">{{ $task->status->status_name }}</div>
        </div>

        <span class="text-white">{{ $task->end_date }}</span>
        <div>
            <a href="{{ route('tasks.create') }}"  class="btn btn-sm badge-success">
                <i class="fas fa-plus"></i>
            </a>
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
    @if(isset($tasks[$task->task_id]))
        @include('task.subtask', ['id' => $task->task_id])
    @endif
@endforeach