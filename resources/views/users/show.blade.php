@extends('layouts.app')

@section('content')
    <h1>User profile</h1>
    @if ( auth()->user()->isAdmin() )

        <a class="btn btn-success text-white" href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add user</a>
    @endif
    <table class="table">
        <tr>
            <th>Picture</th>
            <td><img src="/storage/avatars/{{ $user->avatar }}" style="width:64px; height:64px;"></td>
        </tr><tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr><tr>
            <th>E-Mail</th>
            <td>{{ $user->email }}</td>
        </tr><tr>
            <th>Role</th>
            <td>{{ $user->role }}</td>
        </tr><tr>
            <th>Options</th>
            <td>
                <div class="row align-content-between">
                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-sm btn-primary m-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @if ( auth()->user()->isAdmin() && $user->id!=1 )
                    {!! \Form::open(['route' => ['users.destroy', $user], 'method' => 'delete']) !!}
                    {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                    {!! \Form::hidden('id', $user->id) !!}
                    {!! \Form::close() !!}
                    @endif
                </div>
            </td>
        </tr><tr>
            <th>Password</th>
            <td>
            @if ( auth()->user()->isAdminOrAgent() )
                <a href="{{ route('users.password', [$user->id]) }}">Change Password</a>
            @endif
            </td>
        </tr>
    </table>
@stop