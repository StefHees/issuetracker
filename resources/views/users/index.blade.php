@extends('layouts.app')

@section('content')
    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <h1 class="text-white">Gebruikers overzicht</h1>
            @if ( auth()->user()->isAdmin() )

                <a class="btn btn-success text-white" href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nieuwe gebruiker toevoegen</a>
            @endif

        </div>
        <table  class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Role</th>
                    <th scope="col">Opties</th>
                </tr>
            </thead>
            @foreach($users as $user)

                <tr>

                    <th scope="row"><a href="{{ route('users.show', [$user->id]) }}"><img src="/storage/avatars/{{ $user->avatar }}" style="width:64px; height:64px;"> {{ $user->name }}</a></th>
                    <td><a href="{{ route('users.show', [$user->id]) }}">{{ $user->email }}</a></td>
                    <td><a href="{{ route('users.show', [$user->id]) }}">{{ $user->role }}</a></td>
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
            @endforeach

        </table>
    </div>
@endsection
