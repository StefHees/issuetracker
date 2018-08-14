@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Wijzig een gebruiker') }}</div>

                    <div class="card-body">
                        {!! \Form::model($user, ['route' => 'users.update']) !!}
                        {!! \Form::hidden('id', $user->id) !!}
                        {!! \Form::hidden('password', $user->password) !!}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                                <div class="col-md-6">
                                    {!! \Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    {!! \Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                                <div class="col-md-6">
                                    {!! Form::select('role', ['admin' => 'Admin', 'agent' => 'Agent', 'customer' => 'Customer'], $user->role, ['class' => 'form-control']) !!}
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
