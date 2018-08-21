@extends('layouts.app')

@section('content')
    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <h1 class="text-white">Users</h1>
            @if ( auth()->user()->isAdmin() )
                {!! \Form::open(['route' => ['users.create'], 'method' => 'GET']) !!}
                {!! \Form::button('<i class="fas fa-plus"></i> Add User', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}
                {!! \Form::close() !!}
            @endif

        </div>
        <table  class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Role</th>
                    <th scope="col">Options</th>
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
                        @if ( auth()->user()->isAdmin() && $user->id!=1 )
                        {!! \Form::open(['route' => 'users.delete']) !!}
                        {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                        {!! \Form::hidden('id', $user->id) !!}
                        {!! \Form::close() !!}
                        @endif
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
