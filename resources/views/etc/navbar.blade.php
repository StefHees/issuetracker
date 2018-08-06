<div class="user-nav">
    @guest
        <div class="p-3 row justify-content-center">
            <a class="btn btn-primary text-white m-1" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="btn btn-primary text-white m-1" href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
    @else
        <h3>{{ Auth::user()->name }}</h3>
        <a class="btn btn-primary text-white" href="{{ route('logout') }}">logout</a>
    @endguest
</div>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('issues.index') }}"> Issues</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('statuses.index') }}">Statuses</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('time_registrations.index') }}">Time registrations</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">Disabled</a>
    </li>
</ul>