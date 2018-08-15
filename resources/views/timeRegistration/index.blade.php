@extends('layouts.app')

@section('content')

    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <h1 class="text-white">Time Registrations</h1>
            @if ( auth()->user()->isAdmin() )
                {!! \Form::open(['route' => ['time_registrations.create'], 'method' => 'GET']) !!}
                {!! \Form::button('<i class="fas fa-plus"></i> Add Registration', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}
                {!! \Form::close() !!}
            @endif
        </div>
        @if($TimeRegistrations !== null)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">User</th>
                    <th scope="col">Time (minutes) (hex)</th>
                    <th scope="col">Description </th>
                </tr>
                </thead>
                <tbody>
                {{--{{dd($TimeRegistrations->has('Task'))}}--}}
                {{--{{ $temp = $TimeRegistrations->find(1) }}--}}
                {{--{{dd($temp->user)}}--}}
                @foreach($TimeRegistrations as $registration)
                    <tr>
                        <th scope="row">{{ $registration->id }}</th>
                        {{--<td>{{ dd($registration) }}</td>--}}
                        <td>{{ $registration->task->remarks }}</td>
                        <td>{{ $registration->user->name }}</td>
                        <td>{{ $registration->time_in_minutes }}</td>
                        <td>{{ $registration->remarks }}</td>
                        <td>
                            <div class="row align-content-between">
                                <a href="{{ route('time_registrations.edit', [$registration]) }}"  class="btn btn-sm btn-primary m-1">
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
            <h3>You have no registrations! :(</h3>
        @endif


    </div>
@endsection