@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4 bg-gray">
            <h1 class="text-black">Create user</h1>
            {!! \Form::open(['route' => 'users.store']) !!}
                <div class="form-group">
                    {!! \Form::label('name', 'Naam:') !!}
                    {!! \Form::text('name', '', ['class' => 'form-control'], 'required autofocus') !!}
                </div>

                <div class="form-group">
                    {!! \Form::label('email', 'E-Mail:') !!}
                    {!! \Form::text('email', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! \Form::label('password', 'Wachtwoord:') !!}
                    {!! \Form::password('password', ['class' => 'form-control'], 'required') !!}
                </div>

                <div class="form-group">
                    {!! \Form::label('password-confirm', 'Herhaal wachtwoord:') !!}
                    {!! \Form::password('password_confirmation', ['class' => 'form-control'], 'required') !!}
                </div>

                <div class="form-group">
                    {!! \Form::label('role', 'Rol:') !!}
                    {!! \Form::select('role', ['admin' => 'Admin', 'agent' => 'Agent', 'customer' => 'Customer'], 'customer', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group]">
                    {!! \Form::label('hourly_rate', 'Hourly Rate:') !!}
                    {!! \Form::text('hourly_rate', '', ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! \Form::submit('Aanmaken', ['class' => 'btn btn-small btn-primary']) !!}
                </div>
            {!! \Form::close() !!}
        </div>
    </div>
@endsection
