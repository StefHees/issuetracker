@extends('layouts.app')

@section('content')

    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <a class="btn btn-success text-white" href="{{ route('time_registrations.create') }}"><i class="fas fa-plus"></i> Add Status</a>
        </div>
        @if($TimeRegistrations !== null)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Color (hex)</th>
                    <th scope="col">Order <br>
                    (as appearing on Dashboard)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($TimeRegistrations as $registration)

                    {{--$table->increments('id');--}}
                    {{--$table->unsignedInteger('user_id')->nullable();;--}}
                    {{--$table->unsignedInteger('task_id')->nullable();;--}}
                    {{--$table->integer('time_in_minutes')->nullable();;--}}
                    {{--$table->string('remarks');--}}
                    {{--$table->timestamps();                    --}}

                    <tr>
                        <th scope="row">{{ $registration->id }}</th>
                        <td>{{ $registration->status_name }}</td>
                        <td>{{ $registration->status_description }}</td>
                        <td>{{ $registration->dashboard_color_hex }}</td>
                        <td>{{ $registration->dashboard_order }}</td>
                        <td>
                            <div class="row align-content-between">
                                <a href="{{ route('statuses.edit', [$registration]) }}"  class="btn btn-sm btn-primary m-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                {!! \Form::open(['route' => ['time_registrations.destroy', $registration], 'method' => 'delete']) !!}
                                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                                {!! \Form::close() !!}
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3>You have no statuses! :(</h3>
        @endif


    </div>
@endsection