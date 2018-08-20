{!! \Form::open(['route' => 'comments.store']) !!}

    {{--<div class="card-header"><h2>{{$comment->user->name}} {{$comment->created_at}}</h2></div>--}}
    <div class="card-body" xmlns="http://www.w3.org/1999/html">
        @if (isset($parentId))

            <input type="hidden" name="parent_id" value="{{$parentId}}">
        @endif
        {{--<p class="card-text">{{$comment->text}}</p>--}}
        <textarea name="text"></textarea><br>
        <input type="hidden" name="user_id" value="{{\Auth::id()}}">
        {!! \Form::submit('Reply', ['class' => 'btn btn-small btn-primary']) !!}
    </div>


{!! \Form::close() !!}