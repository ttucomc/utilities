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
                      <li><a href="/user-portal/{{ $teamMember->eraiderID }}">Profile</a></li>
                      @if (Auth::check())
                        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                      @endif
                </ul>

                <ul class="right hide-on-med-and-down">
                      <li><a href="/user-portal/{{ $teamMember->eraiderID }}"><i class="small material-icons left">perm_identity</i>Profile</a></li>
                      @if (Auth::check())
                        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                      @endif
                </ul>

                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        {{-- End of navigation --}}

        {{-- User Main content starts here --}}
        <main class="container">
            <section class="user-content row">
                <div class="col s12">
                    <h1>Welcome {{ $teamMember->first_name }}</h1>
                    <p>Make changes to your bio below. Please note that your changes will be submitted to an administrator for final approval. Approval of changes may take 24-48 hours to finalize.</p>

                    <hr class="team-member-hr">

                    <form action="#" method="POST">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="first_name"
                                       type="text"
                                       name="first_name"
                                       value="{{ $teamMember->first_name }}">
                                <label for="first_name">First Name</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="last_name"
                                       type="text"
                                       name="last_name"
                                       value="{{ $teamMember->last_name }}">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="title"
                                       type="text"
                                       name="title"
                                       value="{{ $teamMember->title }}">
                                <label for="title">Title</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="department"
                                       type="text"
                                       name="department"
                                       value="{{ $teamMember->department }}">
                                <label for="department">Department</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="room_number"
                                       type="text"
                                       name="room_number"
                                       value="{{ $teamMember->room_number }}">
                                <label for="room_number">Room Number</label>
                            </div>
                        </div>

                        @if($teamMember->role == 'faculty')
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="office_hours"
                                           type="text"
                                           name="office_hours"
                                           value="{{ $teamMember->office_hours }}">
                                    <label class="active"
                                           for="office_hours">Office Hours</label>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="bachelor"
                                       type="text"
                                       name="bachelor"
                                       value="{{ $teamMember->bachelor }}">
                                <label for="bachelor">Bachelor's Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="master"
                                       type="text"
                                       name="master"
                                       value="{{ $teamMember->master }}">
                                <label for="master">Master's Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="phd"
                                       type="text"
                                       name="phd"
                                       value="{{ $teamMember->phd }}">
                                <label for="phd">Doctorate Degree</label>
                            </div>
                        </div>

                        @if($teamMember->role == 'faculty')
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="social-handles"
                                              class="materialize-textarea"
                                              name="social-handles"
                                              value="">{{ $teamMember->social_handles }}</textarea>
                                    <label for="social-handles">Social Handles | Website</label>
                                 </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="courses"
                                              class="materialize-textarea"
                                              name="courses"
                                              value="">{{ $teamMember->courses }}</textarea>
                                    <label for="bio">Courses</label>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="bio"
                                          class="materialize-textarea"
                                          name="bio"
                                          value="">{{ $teamMember->bio }}</textarea>
                                <label for="bio">Bio</label>
                            </div>
                        </div>

                        @if($teamMember->role == 'faculty')
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="research"
                                          class="materialize-textarea"
                                          name="research"
                                          value="">{{ $teamMember->research }}</textarea>
                                <label for="bio">Research</label>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="duties"
                                          class="materialize-textarea"
                                          name="duties"
                                          value="">{{ $teamMember->duties }}</textarea>
                                <label for="duties">Duties</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="training"
                                          class="materialize-textarea"
                                          name="training"
                                          value="">{{ $teamMember->training }}</textarea>
                                <label for="training">Training</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6">
                                <h4>Profile Photo</h4>
                                <img class="materialboxed" width="400" src="{{ $teamMember->photo }}" alt="User Profile Photo">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        {{-- End of main content --}}

        @include('layouts.include-snippets.footer')

        @include('layouts.include-snippets.user-javascript')
    </body>
</html>
