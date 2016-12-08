<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COMC Utilities</title>

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <meta id="token" name="token" value="{{ csrf_token() }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="/css/app.css">

        <script src="/js/app.js"></script>
        <script src="/js/materialize.min.js"></script>

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
                    <a href="#" class="brand-logo">
                        <img src="/storage/images/header-logo.svg" alt="TTU Utilities Header Logo" />
                    </a>

                    <ul id="slide-out" class="side-nav">
                        @if (Auth::check())
                            <li><a href="/#">Profile</a></li>
                            <li><a href="/#/create-faculty-member">Create Faculty</a></li>
                            <li><a href="/#/create-staff-member">Create Staff</a></li>
                            <li><a href="/#/create-news-article">Create Article</a></li>
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        @endif
                    </ul>

                    <ul class="right hide-on-med-and-down">
                        @if (Auth::check())
                            <li><a href="/#"><i class="small material-icons left">perm_identity</i>Profile</a></li>
                            <li><a name="faculty-staff" class="dropdown-button" data-beloworigin="true" data-activates="faculty-staff-dropdown">Faculty/Staff<i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a name="news" class="dropdown-button" data-beloworigin="true" data-activates="news-dropdown">News Articles<i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        @endif
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
                        @if(Auth::check())
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
                        © 2016 Copyright Text
                    </div>
                </div>
            </footer>
            {{-- End of footer --}}
        </div>
        {{-- End of vue div --}}

        <script src="/js/vuejs-entrypoint.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Side Nav on mobile
                $('.button-collapse').sideNav({
                    closeOnClick: true
                });

                // Dropdown nav items
                $('.dropdown-button').dropdown({
                    inDuration: 300,
                    outDuration: 225,
                    constrain_width: false,
                    hover: true,
                    alignment: 'right'
                });

                // Login modal will display if user is not logged in
                @if(! Auth::check())
                    $('#login-modal').openModal({dismissible:false});
                @endif
            });
        </script>

    </body>

</html>
