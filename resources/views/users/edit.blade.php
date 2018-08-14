@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4 bg-gray">
            <h1>Gebruiker wijzigen</h1>
            {!! \Form::model($user, ['route' => 'users.update']) !!}
                {!! \Form::hidden('id', $user->id) !!}
                {!! \Form::hidden('password', $user->password) !!}

                <div class="form-group]">
                    {!! Form::label('name', 'Naam:') !!}
                    {!! \Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group]">
                    {!! Form::label('email', 'E-Mail:') !!}
                    {!! \Form::text('email', $user->email, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group]">
                    {!! Form::label('role', 'Rol:') !!}
                    {!! Form::select('role', ['admin' => 'Admin', 'agent' => 'Agent', 'customer' => 'Customer'], $user->role, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group] mb-0">
                    {!! \Form::submit('Opslaan', ['class' => 'btn btn-small btn-primary']) !!}
                </div>
            {!! \Form::close() !!}
        </div>
    </div>
@endsection
