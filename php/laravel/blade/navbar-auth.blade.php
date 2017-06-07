@if (Auth::guest())
    <li><a href="{{ url('/login') }}">Login</a></li>
@else
    <li>
        <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            Logout {{ Auth::user()->name }}
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
@endif
