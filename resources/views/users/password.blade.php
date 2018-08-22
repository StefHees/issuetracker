@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Wijzig wachtwoord') }}</div>

                    <div class="card-body">
                        {!! \Form::model($user, ['route' => ['users.update_password', $user], 'method' => 'patch']) !!}
                        {!! \Form::hidden('id', $user->id) !!}
                        {!! \Form::hidden('name', $user->name) !!}
                        {!! \Form::hidden('email', $user->email) !!}
                        {!! \Form::hidden('role', $user->role) !!}

                        <div class="form-group row">
                            {!! \Form::label('password', 'Wachtwoord', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                            {{ \Form::password('password', ['class' => 'form-control'], 'required') }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! \Form::label('password-confirm', 'Herhaal wachtwoord', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                            {{ \Form::password('password_confirmation', ['class' => 'form-control'], 'required') }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! \Form::submit('Opslaan', ['class' => 'btn btn-small btn-primary']) !!}
                            </div>
                        </div>
                        {!! \Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
