@extends('layouts.app')

@section('content')
    <h1>Gebruikers overzicht</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nieuwe gebruiker toevoegen</a>
    <table class="table">
        <tr>
            <th>Naam</th>
            <td>{{ $user->name }}</td>
        </tr><tr>
            <th>E-Mail</th>
            <td>{{ $user->email }}</td>
        </tr><tr>
            <th>Role</th>
            <td>{{ $user->role }}</td>
        </tr><tr>
            <th>Opties</th>
            <td class="btn-group ">
                <a href="{{ route('users.edit', [$user->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                &nbsp&nbsp
                {!! \Form::open(['route' => 'users.destroy']) !!}
                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                {!! \Form::hidden('id', $user->id) !!}
                {!! \Form::close() !!}
            </td>
        </tr>
    </table>
@stop