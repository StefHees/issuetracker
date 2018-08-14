
<div class="m-0" style="border-left:{{ $border += 15 }}px solid #003b9b">
    <div class="row bg-dark text-white justify-content-between p-0 m-0 p-2">
        <div><i class="fas fa-angle-right btn"></i></div>
        <span style="width:20%;">{{$subtask->title}}</span>
        <span style="width:20%;">{{$subtask->priority}}/10</span>
        <span style="width:10%;">est. {{$subtask->estimation}}h</span>
        <div class="progress" style="width:20%; height:25px;">
            <div class="progress-bar" role="progressbar" style="width: {{$subtask->progress}}%;" aria-valuenow="{{$subtask->progress}}" aria-valuemin="0" aria-valuemax="100">{{$subtask->progress}}%</div>
        </div>

        <div>
            <div class="btn btn-primary btn-sm">{{ $subtask->status->status_name }}</div>
        </div>

        <span class="text-white">{{ $subtask->end_date }}</span>
        <div>
            <a href="{{ route('tasks.create') }}"  class="btn btn-sm badge-success">
                <i class="fas fa-plus"></i>
            </a>
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
@if($subtask->children->count() > 0)
    @foreach($subtask->children as $subsubtask)
        @include('task.subtask', ['subtask' => $subsubtask, 'border' => $border])
    @endforeach
@endif