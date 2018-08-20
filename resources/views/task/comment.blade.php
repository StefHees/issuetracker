<div class="card" style="margin:15px;">
    {{--printed in comment.blade--}}
    <div class="card-header"><h2>{{$comment->user->name}} {{$comment->created_at}}</h2></div>
    <div class="card-body">
        <p class="card-text">{{$comment->text}}</p>
    </div>
    @if($comment->childeren)
        @foreach($comment->childeren as $comment)
            @include('task.comment', ['comment' => $comment])
        @endforeach
    @endif
</div>