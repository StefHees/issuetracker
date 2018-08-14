@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4 bg-gray">
            <h1>Gebruiker aanmaken</h1>
            {!! \Form::open(['route' => 'users.store']) !!}
                <div class="form-group row">
                    {!! Form::label('name', 'Naam', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        {!! \Form::text('name', '', ['class' => 'form-control'], 'required autofocus') !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('email', 'E-Mail', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        {!! \Form::text('email', '', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('password', 'Wachtwoord', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        {{ Form::password('password', ['class' => 'form-control'], 'required') }}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('password-confirm', 'Herhaal wachtwoord', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        {{ Form::password('password_confirmation', ['class' => 'form-control'], 'required') }}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('role', 'Role', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        {{ Form::select('role', ['admin' => 'Admin', 'agent' => 'Agent', 'customer' => 'Customer'], 'customer', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {!! \Form::submit('Aanmaken', ['class' => 'btn btn-small btn-primary']) !!}
                    </div>
                </div>
            {!! \Form::close() !!}
        </div>
    </div>
@endsection
