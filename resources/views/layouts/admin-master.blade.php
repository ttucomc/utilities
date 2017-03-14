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
                    <div class="row" style="padding-top: 2rem;">
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <div class="col s12">
                                <h3 style="text-align: center;">Admin Dashboard: <small>Welcome, {{ Auth::user()->first_name }}</small></h3>

                                <div style="margin-bottom: 4rem;" id="search-bar-feature"></div>

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

        <script type="text/javascript">
            let searchBar = new Vue({
                el: '#search-bar-feature',
                template: `
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input type="text" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">Faculty/Staff</label>
                        </div>
                    </div>
                `,
                data: {
                    teamMembersData: [],
                },
                mounted: function() {
                    this.getAllTeamMembers();
                },
                methods: {
                    getAllTeamMembers() {
                        const vm = this;

                        vm.$http.get('/admin-portal/api/get-all-team-members')
                        .then((response) => {
                            vm.teamMembersData = response.body;

                            let newData = $.extend({}, $('input.autocomplete').autocomplete());

                            let arrLen = vm.teamMembersData.length
                            for(let i = 0; i < arrLen; i++) {
                                newData.data((vm.teamMembersData[i]["first_name"] + ' ' +  vm.teamMembersData[i]["last_name"]), null);
                                //console.log(newData.data());
                            }

                            $('input.autocomplete').autocomplete({
                                data: newData.data(),
                                limit: 10, // The max amount of results that can be shown at once.
                            });

                        }, (error) => {
                            Materialize.toast("There was an error fetching the bio requests. Please consult the console log", 4000, 'red');

                            console.log(error.body);
                        });
                    }
                }
            });
        </script>
    </body>
</html>
