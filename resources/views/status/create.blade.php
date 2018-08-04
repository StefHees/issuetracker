@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <div class="col-md-8 m-auto rounded p-4" style="background-color:#f7f7f7;">
            {!! \Form::open(['route' => 'statuses.store']) !!}

            <div class="form-group">
                <label for="name">Name:</label>
                {!! \Form::text('status_name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="address">Description:</label>
                {{ Form::text('status_description', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label for="email">Color (as hex e.g. #000000):</label>
                {!! \Form::text('dashboard_color_hex', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="phone_number" class="form-label">Dashboard order:</label>
                {!! \Form::text('dashboard_order', null, ['class' => 'form-control']) !!}
            </div>
            {!! \Form::submit('Create', ['class' => 'btn btn-small btn-primary']) !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection