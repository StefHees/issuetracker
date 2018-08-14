@extends('layouts.app')

@section('content')
    <h1>Gebruiker overzicht</h1>
    @if ( auth()->user()->isAdmin() )

        <a class="btn btn-success text-white" href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nieuwe gebruiker toevoegen</a>
    @endif
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
            <td>
                <div class="row align-content-between">
                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-sm btn-primary m-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    {!! \Form::open(['route' => 'users.destroy']) !!}
                    {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                    {!! \Form::hidden('id', $user->id) !!}
                    {!! \Form::close() !!}
                </div>
            </td>
        </tr>
    </table>
@stop