@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Maak een gebruiker') }}</div>

                    <div class="card-body">
                        {!! \Form::open(['route' => 'users.store']) !!}
                        <!--<form method="POST" action="{ { route('users.store') }}" aria-label="{ { __('Register') }}">-->

                            <div class="form-group row">
                                {!! Form::label('name', 'Naam', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                <div class="col-md-6">
                                    {!! \Form::text('name', '', ['class' => 'form-control'], 'required autofocus') !!}
<!--                                    <input id="name" type="text" class="form-control{ { $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{ { old('name') }}" required autofocus>
                                    @ if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{ { $errors->first('name') }}</strong>
                                    </span>
                                    @ endif
                                        -->
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email', 'E-Mail', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                <div class="col-md-6">
                                    {!! \Form::text('email', '', ['class' => 'form-control']) !!}
<!--                                    <input id="email" type="email" class="form-control{ { $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{ { old('email') }}" required>
                                    @ if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{ { $errors->first('email') }}</strong>
                                    </span>
                                    @ endif
                                        -->
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password', 'Wachtwoord', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                <div class="col-md-6">
                                    {{ Form::password('password', ['class' => 'form-control'], 'required') }}
<!--                                    <input id="password" type="password" class="form-control{ { $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @ if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{ { $errors->first('password') }}</strong>
                                    </span>
                                    @ endif
                                        -->
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password-confirm', 'Herhaal wachtwoord', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                <div class="col-md-6">
                                    {{ Form::password('password_confirmation', ['class' => 'form-control'], 'required') }}
<!--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>-->
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
            </div>
        </div>
    </div>
@endsection
