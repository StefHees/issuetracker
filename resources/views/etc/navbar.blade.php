<div class="user-nav">
    @guest

    <div class="p-3 row justify-content-center">
        <a class="btn btn-primary text-white m-1" href="{{ route('login') }}">{{ __('Login') }}</a>
    </div>
    @else

    <h3>&nbsp;&nbsp;&nbsp;{{ Auth::user()->name }}</h3>
    {!! \Form::open(['route' => 'logout']) !!}
    &nbsp;&nbsp;&nbsp;{!! \Form::submit('Uitloggen', ['class' => 'btn btn-primary text-white']) !!}
    {!! \Form::close() !!}
    @endguest
</div>
<ul class="nav flex-column">
@if (auth()->check())
    @if ( auth()->user()->isAdmin() )

    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
    </li>
    @else

    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.show', ['id' => auth()->user()->id]) }}">My profile</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}"> Dashboard</a>
        </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )

    <li class="nav-item">
        <a class="nav-link" href="{{ route('tasks.index') }}"> Tasks</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )

    <li class="nav-item">
        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )

    <li class="nav-item">
        <a class="nav-link" href="{{ route('statuses.index') }}">Statuses</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )

    <li class="nav-item">
        <a class="nav-link" href="{{ route('time_registrations.index') }}">Time registrations</a>
    </li>
    @endif
@endif

</ul>
