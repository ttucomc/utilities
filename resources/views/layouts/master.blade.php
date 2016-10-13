<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COMC Utilities</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>

    <body>

        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">
                    <img src="{{ asset('storage/images/header-logo.svg') }}" alt="TTU Utilities Header Logo" />
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
                <ul id="slide-out" class="side-nav">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        {{-- Content goes here --}}
        <main style="height: 90vh;">
            <div class="container">
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col s8">
                        <img src="{{ asset('storage/images/ttu_logo.svg') }}" alt="TTU Logo" />
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

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>

        <script type="text/javascript">

            $(".button-collapse").sideNav();

        </script>

    </body>

</html>
