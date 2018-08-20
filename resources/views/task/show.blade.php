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
                {{-- TV: doesn't seem right: if a comment has a pernt display it?? No you want the data of the parent but thats not available at tis passing of the loop--}}
                {{--@if($comment->parent)--}}
                    {{--<div class="card-header"><h2>{{$comment->user->name}} {{$comment->created_at}}</h2></div>--}}
                    {{--<div class="card-body">--}}
                        {{--<p class="card-text">{{$comment->text}}</p>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--@if($comment->children)--}}
                    {{--@foreach($comment->children as $comment)--}}
                        {{--@include('task.comment', ['comment' => $comment])--}}
                    {{--@endforeach--}}
                {{--@endif--}}


                <div class="card-header"><h2>{{$comment->user->name}} {{$comment->created_at}}</h2></div>
                <div class="card-body">
                    <p class="card-text">{{$comment->text}}</p>
                </div>


                @include('task.comment_form', ['parentId' =>$comment->parent_id])

            </div>
        @endforeach

        <h3>Leave a reply</h3>
        @include('task.comment_form')

    @endif
@endsection