<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COMC Utilities</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="/css/app.css">

        <script src="/js/app.js"></script>
        <script src="/js/materialize.min.js"></script>

    </head>

    <body>

        {{-- Navigation --}}
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">
                    <img src="/storage/images/header-logo.svg" alt="TTU Utilities Header Logo" />
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @if (Auth::check())
                        <li><a href="#">Faculty/Staff</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="/#">Profile</a></li>
                        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                    @endif
                </ul>
                <ul id="slide-out" class="side-nav">
                    @if (Auth::check())
                        <li><a href="#">Faculty/Staff</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="/#">Profile</a></li>
                        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                    @endif
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        {{-- End of navigation --}}

        {{-- Main content for each page starts here --}}
        <main>
            <div class="container">
                <div class="row">
                    @yield('content')
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

        <script type="text/javascript">
            $(".button-collapse").sideNav();
        </script>

    </body>

</html>
