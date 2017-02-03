<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.include-snippets.head')
    </head>

    <body>
        {{-- Start of vue div --}}
        <div id="admin-dashboard-vuejs-content">
            @include('layouts.include-snippets.nav-admin')

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

            @include('layouts.include-snippets.footer')
        </div>
        {{-- End of vue div --}}

        @include('layouts.include-snippets.admin-javascript')
    </body>
</html>
