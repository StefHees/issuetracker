@extends('layouts.app')

@section('content')

    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            @if ( auth()->user()->isAdmin() )

            <a class="btn btn-success text-white" href="{{ route('clients.create') }}"><i class="fas fa-plus"></i> Add Client</a>
            @endif

        </div>
    @if($clients !== null)

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            @if ( auth()->user()->isAdmin() )

            <th scope="col">Options</th>
            @endif

        </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)

                <tr>
                    <th scope="row">{{ $client->id }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->email }}</td>
                    @if ( auth()->user()->isAdmin() )

                    <td>
                        <div class="row align-content-between">
                            <a href="{{ route('clients.edit', [$client]) }}"  class="btn btn-sm btn-primary m-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! \Form::open(['route' => ['clients.destroy', $client], 'method' => 'delete']) !!}
                                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                            {!! \Form::close() !!}
                        </div>
                    </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
    @else

        <h3>You have no clients! :(</h3>
    @endif

    </div>
@endsection