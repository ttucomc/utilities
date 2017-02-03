<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.include-snippets.head')
    </head>

    <body>
        {{-- Dropdown structure --}}
        <ul id="faculty-staff-dropdown" class="dropdown-content">
            <li><a href="/#/create-faculty-member">Create Faculty<i class="small material-icons right">input</i></a></li>
            <li class="divider"></li>
            <li><a href="/#/create-staff-member">Create Staff<i class="small material-icons right">input</i></a></li>
        </ul>
        <ul id="news-dropdown" class="dropdown-content">
            <li><a href="/#/create-news-article">Create Article<i class="small material-icons right">input</i></a></li>
        </ul>

        {{-- Start of vue div --}}
        <div id="admin-dashboard-vuejs-content">
            {{-- Navigation --}}
            <nav>
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo">
                        <img src="/storage/images/header-logo.svg" alt="CoMC Logo" title="College of Media &amp; Communication" />
                    </a>

                    <ul id="slide-out" class="side-nav">
                          <li><a href="/">Profile</a></li>
                          <li><a href="/admin-portal">Admin</a></li>
                          @if (Auth::check())
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                          @endif
                    </ul>

                    <ul class="right hide-on-med-and-down">
                          <li><a href="/"><i class="small material-icons left">perm_identity</i>Profile</a></li>
                          <li><a href="/admin-portal">Admin</a></li>
                          @if (Auth::check())
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                          @endif
                    </ul>

                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>
            {{-- End of navigation --}}

            {{-- Main content for each page starts here --}}
            <main class="container">
                {{-- router-view is the vuejs dynamic content area --}}
                <router-view></router-view>
            </main>
            {{-- End of main content --}}

            @include('layouts.include-snippets.footer')
        </div>
        {{-- End of vue div --}}

        @include('layouts.include-snippets.user-javascript')
    </body>
</html>
