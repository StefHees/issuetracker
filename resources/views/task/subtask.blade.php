<div class="task-background">
    <div style="margin-left:{{ $margin +=15 }}px; border:1px solid #5d6975">
        <div class="row bg-dark text-white justify-content-between p-0 m-0 p-2">
            <div class="drop-down"><i class="fas fa-angle-down btn"></i></div>
            <span style="width:20%;">{{$subtask->title}}</span>
            <span style="width:30px;">{{$subtask->priority}}/10</span>
            <span style="width:10%;">est. {{$subtask->estimation}}h</span>
            <div class="progress" style="width:20%; height:25px;">
                <div class="progress-bar" role="progressbar" style="width: {{$task->progress}}%;" aria-valuenow="{{$subtask->progress}}" aria-valuemin="0" aria-valuemax="100">{{$task->progress}}%</div>
            </div>

            <div>
                <div class="btn btn-primary btn-sm">{{ $subtask->status->status_name }}</div>
            </div>

            <span class="text-white">{{ $subtask->end_date }}</span>
            <div>
                <a href="{{ route('tasks.show', [$subtask]) }}" class="btn btn-primary btn-sm">Show</a>
            </div>
            <div>
                {!! \Form::open(['route' => ['tasks.create', 'id' => $subtask->id], 'method' => 'POST']) !!}
                {!! \Form::button('<i class="fas fa-plus"></i>', ['type' => 'submit', 'class' => 'btn btn-sm badge-success']) !!}
                {!! \Form::close() !!}
            </div>
            <div>
                <a href="{{ route('tasks.edit', [$subtask]) }}"  class="btn btn-sm btn-primary">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </div>
            <div>
                {!! \Form::open(['route' => ['tasks.destroy', $subtask], 'method' => 'delete']) !!}
                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                {!! \Form::close() !!}
            </div>
        </div>
    </div>
    <div class="task-dropped">
        @if($subtask->children->count() > 0)
            @foreach($subtask->children as $subsubtask)
                @include('task.subtask', ['subtask' => $subsubtask, 'margin' => $margin])
            @endforeach
        @endif
    </div>
</div>