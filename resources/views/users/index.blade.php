@extends('layouts.app')

@section('content')
    <h1>Gebruikers overzicht</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nieuwe gebruiker toevoegen</a>
    <table class="table">
        <tr>
            <th>Naam</th>
            <th>E-Mail</th>
            <th>Role</th>
            <th>Opties</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td><a href="{{ route('users.show', [$user->id]) }}">{{ $user->name }}</a></td>
                <td><a href="{{ route('users.show', [$user->id]) }}">{{ $user->email }}</a></td>
                <td><a href="{{ route('users.show', [$user->id]) }}">{{ $user->role }}</a></td>
                <td class="btn-group ">
                    <a href="{{ route('users.edit', [$user->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                    &nbsp;&nbsp;
                    {!! \Form::open(['route' => 'users.destroy']) !!}
                    {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                    {!! \Form::hidden('id', $user->id) !!}
                    {!! \Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@stop