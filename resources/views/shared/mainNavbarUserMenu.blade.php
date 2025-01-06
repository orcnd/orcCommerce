@if (Auth::check())
<div class="dropdown">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{Auth::user()->name}}
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="#">{{__('Settings')}}</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="{{route('logout')}}">{{__('Sign out')}}</a></li>
    </ul>
</div>
@else
<div class="dropdown">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{__('Login')}}
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="{{route('login')}}">{{__('Login')}}</a></li>
        <li><a class="dropdown-item" href="{{route('register')}}">{{__('Register')}}</a></li>
    </ul>
</div>
@endif
