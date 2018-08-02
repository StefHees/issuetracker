@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            {!! \Form::open(['route' => 'clients.store']) !!}

            <div class="form-group">
                <label for="name">Name:</label>
                {!! \Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                {{ Form::text('address', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                {!! \Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="phone_number" class="form-label">Phone number:</label>
                {!! \Form::tel('phone_number', null, ['class' => 'form-control']) !!}
            </div>
            {!! \Form::submit('Toevoegen', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection