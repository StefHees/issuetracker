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
        <div class="row justify-content-center">
            <img src="{{ Auth::user()->image_path }}" style="width:75px; height:75px; margin:5px;">
        </div>
        <h5 class="text-center m-0">{{ Auth::user()->name }}</h5>
        <p class="text-center text-muted m-0">{{ Auth::user()->role }}</p>
        <div class="row justify-content-center">
            <a class="btn btn-primary text-white" href="{{ route('logout') }}">logout</a>
        </div>
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
        <a class="nav-link" href="{{ route('tasks.index') }}"> Tasks</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('types.index') }}"> Types</a>
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