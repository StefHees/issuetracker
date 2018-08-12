@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            {!! \Form::open(['route' => 'time_registrations.store']) !!}


           {{--{{ dump(\Auth::user()) }}--}}

            <div class="form-group">
                <label for="user_id">User:</label>
                {{--{!! Form::select('size', $Users, \Auth::user()) !!}--}}
                {!! Form::select('user_id', $Users, Auth::id(),['class' => 'form-control']) !!}
           </div>

            <div class="form-group">
                <label for="task_id">Task:</label>
                {{--{!! Form::select('size', $Users, \Auth::user()) !!}--}}
                {!! Form::select('task_id', $Tasks, null, ['class' => 'form-control']) !!}
            </div>

           <div class="form-group">
               <label for="time_in_minutes">Time (in minutes, round by 15 min.):</label>
               {!! \Form::text('time_in_minutes', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="remarks" class="form-label">Remarks:</label>
                {!! \Form::text('remarks', null, ['class' => 'form-control']) !!}
            </div>
            {!! \Form::submit('Create', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection