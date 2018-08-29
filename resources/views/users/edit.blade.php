@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4 bg-gray">
            <h1>Edit user</h1>
            {!! Form::model($user, ['route' => ['users.update', $user], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
                {!! \Form::hidden('id', $user->id) !!}
                {!! \Form::hidden('password', $user->password) !!}

                <div class="form-group]">
                    <div><img src="{{ route('avatar.show', [$user->avatar]) }}" style="width:64px; height:64px;"></div>
                    {!! Form::label('avatar', 'Avatar:', ['class' => 'cabinet']) !!}
                    <label class="cabinet">
                        <input type="file" class="file" id="avatar" name="avatar">
                    <!--{ !! \Form::file('avatar', ['class' => 'file']) !!}
                    -->
                    </label>
                </div>

                <div class="form-group]">
                    {!! Form::label('name', 'Name:') !!}
                    {!! \Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group]">
                    {!! Form::label('email', 'E-Mail:') !!}
                    {!! \Form::text('email', $user->email, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group]">
                    {!! Form::label('hourly_rate', 'Hourly Rate &euro;:') !!}
                    @if(auth()->user()->isAdmin())

                        {!! \Form::text('hourly_rate', ($user->hourly_rate)/100, ['class' => 'form-control']) !!}
                    @endif

                </div>

                <div class="form-group]">
                    {!! Form::label('role', 'Role:') !!}
                    @if(auth()->user()->isAdmin())

                    {!! Form::select('role', ['admin' => 'Admin', 'agent' => 'Agent', 'customer' => 'Customer'], $user->role, ['class' => 'form-control']) !!}
                    @else

                    {!! Form::select('role', ['admin' => 'Admin', 'agent' => 'Agent', 'customer' => 'Customer'], $user->role, ['disabled', 'class' => 'form-control']) !!}
                    @endif

                </div>

                <div class="form-group] mb-0">
                    {!! \Form::submit('Update', ['class' => 'btn btn-small btn-primary']) !!}
                </div>
            {!! \Form::close() !!}
        </div>
    </div>
@endsection
