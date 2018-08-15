@extends('layouts.app')

@section('content')
    <div class="col-10 m-auto mt-5">

<div class="card">
    <div class="card-header"><h2>{{$task->title}}</h2></div>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">Type: {{ $task->type->title }}</p>
        <p class="card-text">Teammembers: @foreach($task->users as $user){{ $user->name }}, @endforeach</p>
        <p class="card-text">Client: {{ $task->client->name }}</p>
        <p class="card-text">{{$task->description}}</p>
    </div>
</div>

    @if($task->comments)
        @foreach($task->comments as $comment)
            <div class="card">
                <div class="card-header"><h2>{{$comment->user->name}} {{$comment->created_at}}</h2></div>
                <div class="card-body">
                    <p class="card-text">{{$comment->text}}</p>
                </div>
                @if($comment->children)
                    @foreach($comment->children as $comment)
                        @include('task.comment', ['comment' => $comment])
                    @endforeach
                @endif
            </div>
        @endforeach
    @endif
@endsection