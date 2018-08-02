@extends('layouts.app')

@section('content')
    @if($clients !== null)
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Options</th>
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
                    <td>Edit / Delete</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h3>You have no clients! :(</h3>
    @endif



@endsection