{{-- Navigation --}}
<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">
            <img src="/storage/images/header-logo.svg" alt="TTU Utilities Header Logo" />
        </a>

        <ul id="slide-out" class="side-nav">
            @if (Auth::check())
                <li><router-link to="/admin-portal">Profile</router-link></li>
                <li><router-link to="/admin-portal/create-faculty-member">Create Faculty</router-link></li>
                <li><router-link to="/admin-portal/create-staff-member">Create Staff</router-link></li>
                <li><router-link to="/admin-portal/create-news-article">Create Article</router-link></li>
                <li><a href="{{ url('auth/logout') }}">Logout</a></li>
            @endif
        </ul>

        <ul class="right hide-on-med-and-down">
            @if (Auth::check())
                <li><router-link to="/admin-portal"><i class="small material-icons left">perm_identity</i>Profile</router-link></li>
                <li><a name="faculty-staff" class="dropdown-button" data-beloworigin="true" data-activates="faculty-staff-dropdown">Faculty/Staff<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a name="news" class="dropdown-button" data-beloworigin="true" data-activates="news-dropdown">News Articles<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="{{ url('auth/logout') }}">Logout</a></li>
            @endif
        </ul>

        {{-- Dropdown structure for drop down arrows in navigation (only on large screens) --}}
        <ul id="faculty-staff-dropdown" class="dropdown-content">
            <li><router-link to="/admin-portal/create-faculty-member">Create Faculty<i class="small material-icons right">input</i></router-link></li>
            <li class="divider"></li>
            <li><router-link to="/admin-portal/create-staff-member">Create Staff<i class="small material-icons right">input</i></router-link></li>
        </ul>
        <ul id="news-dropdown" class="dropdown-content">
            <li><router-link to="/admin-portal/create-news-article">Create Article<i class="small material-icons right">input</i></router-link></li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
{{-- End of navigation --}}
