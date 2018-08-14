<div class="user-nav">
    @guest
        <div class="p-3 row justify-content-center">
            <a class="btn btn-primary text-white m-1" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="btn btn-primary text-white m-1" href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
    @else
        <h3>{{ Auth::user()->name }}</h3>
        {!! \Form::open(['route' => 'logout']) !!}
        {!! \Form::submit('Uitloggen', ['class' => 'btn btn-primary text-white']) !!}
        {!! \Form::close() !!}
    @endguest
</div>
<ul class="nav flex-column">
@if (auth()->check())
    @if ( auth()->user()->isAdmin() )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('issues.index') }}"> Issues</a>
    </li>
    @endif
    @if ( auth()->user()->isAdmin() )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
    </li>
    @endif
    @if ( auth()->user()->isAdmin() )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('statuses.index') }}">Statuses</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('time_registrations.index') }}">Time registrations</a>
    </li>
    @endif
    @if ( auth()->user()->isAdminOrAgent() )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('changes.password') }}">Wachtwoord</a>
    </li>
    @endif
@endif
</ul>