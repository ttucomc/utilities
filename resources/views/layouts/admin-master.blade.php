<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.include-snippets.head')
    </head>

    <body>
        {{-- Start of vue div --}}
        <div id="admin-dashboard-vuejs-content">
            {{-- Navigation --}}
            <nav>
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo">
                        <img src="/storage/images/header-logo.svg" alt="TTU Utilities Header Logo" />
                    </a>

                    <ul id="slide-out" class="side-nav">
                        @if (Auth::check())
                            <li><a href="/admin-portal">Profile</a></li>
                            <li><router-link to="/admin/create-faculty-member">Create Faculty</router-link></li>
                            <li><router-link to="/admin/create-staff-member">Create Staff</router-link></li>
                            <li><router-link to="/admin/create-news-article">Create Article</router-link></li>
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
                        <li><router-link to="/admin/create-faculty-member">Create Faculty<i class="small material-icons right">input</i></router-link></li>
                        <li class="divider"></li>
                        <li><router-link to="/admin/create-staff-member">Create Staff<i class="small material-icons right">input</i></router-link></li>
                    </ul>
                    <ul id="news-dropdown" class="dropdown-content">
                        <li><router-link to="/admin/create-news-article">Create Article<i class="small material-icons right">input</i></router-link></li>
                    </ul>

                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>
            {{-- End of navigation --}}

            {{-- Main content for each page starts here --}}
            <main>
                @include('auth.login-modal')

                <div class="container">
                    <div class="row" style="padding-top: 2em;">
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <div class="col s12">
                                <h3>Admin Dashboard: <small>Welcome, {{ Auth::user()->first_name }}</small></h3>

                                <section class="search-bar" style="padding: .5em 0 .5em 0;">
                                    <div class="nav-wrapper">
                                        <form>
                                            <div class="input-field">
                                                <input id="search" type="search">
                                                <label for="search"><i class="material-icons">search</i>Faculty/Staff or News articles</label>
                                                <i class="material-icons">close</i>
                                            </div>
                                        </form>
                                    </div>
                                </section>

                                {{-- router-view is the vuejs dynamic content area --}}
                                <router-view></router-view>
                            </div>
                        @else
                            @include('errors.unauthorized-access')
                        @endif
                    </div>
                </div>
            </main>
            {{-- End of main content --}}

            {{-- Footer --}}
            <footer class="page-footer">
                <div class="container">
                    <div class="row">
                        <div class="col s8">
                            <img src="/storage/images/ttu_logo.svg" alt="TTU Logo" />
                            <p>
                                From here, anything is possible. <br>
                                2500 Broadway Lubbock,Texas 79409 <br>
                                806.742.2011
                            </p>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        © <?php echo date('Y'); ?> College of Media &amp; Communication
                    </div>
                </div>
            </footer>
            {{-- End of footer --}}
        </div>
        {{-- End of vue div --}}

        @include('layouts.include-snippets.admin-javascript')
    </body>
</html>
