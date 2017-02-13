<?php
    if(isset($_GET["elu"])) {
        // header('Location: /user-portal/?elu=' . $_GET["elu"]);
        header('Location: /user-portal/' . $_GET["elu"]);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.include-snippets.head')
    </head>

    <body>
        {{-- Navigation --}}
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">
                    <img src="/storage/images/header-logo.svg" alt="CoMC Logo" title="College of Media &amp; Communication" />
                </a>

                <ul id="slide-out" class="side-nav">
                      <li><a href="/eraider-sign-in">Profile</a></li>
                      <li><a href="/admin-portal">Admin</a></li>
                      @if (Auth::check())
                        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                      @endif
                </ul>

                <ul class="right hide-on-med-and-down">
                      <li><a href="/eraider-sign-in"><i class="small material-icons left">perm_identity</i>Profile</a></li>
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
            <section id="home" class="row">
                <div class="col s12">
                    <h1>CoMC Utilities</h1>
                    <p>
                        Welcome to the College of Media &amp; Communication utilities. From here you can edit your faculty/staff bio on our site. Administrators are able to add and edit faculty/staff, create news articles and more.
                    </p>
                </div>
                <div class="col s12">
                    <h2>Get Started</h2>
                </div>
                <div class="col s12 m6">
                    <div class="card grey lighten-3">
                        <div class="card-content">
                            <span class="card-title"><i class="material-icons large">person</i><br />Faculty/Staff Bio</span>
                        </div>
                        <div class="card-action">
                            <a href="/eraider-sign-in">Edit your bio</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card grey lighten-3">
                        <div class="card-content">
                            <span class="card-title"><i class="material-icons large">settings</i><br />Administrators</span>
                        </div>
                        <div class="card-action">
                            <a href="/admin-portal">Access admin portal</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        {{-- End of main content --}}

        @include('layouts.include-snippets.footer')

        @include('layouts.include-snippets.user-javascript')
    </body>
</html>
