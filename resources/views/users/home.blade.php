<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.include-snippets.head')
    </head>

    <body>
        @include('layouts.include-snippets.nav-team')

        {{-- User Main content starts here --}}
        <main class="container">
            <section class="user-content row">
                <div class="col s12">
                    <!-- Errors and status session messages -->
                    @include('layouts.include-snippets.errors')
                    @include('layouts.include-snippets.success-status')

                    <h1>Welcome {{ $teamMember->first_name }}</h1>
                    <h5>Make changes to your bio below. Please note that your changes will be submitted to an administrator for final approval. Approval of changes may take 24-48 hours to finalize.</h5>
                    @if(! $teamMember->photo)
                        <h5><strong>It looks like you don't have a profile photo associated with your bio. Profile photo requests must be sent by email to the administrator for approval.</strong></h5>
                    @endif

                    <hr class="team-member-hr">

                    <form action="api/team/update-bio-request" method="POST">
                        {{ csrf_field() }}

                        <!-- Hidden fields, user can update cv but will do so
                             with dropzone.js -->
                        <input type="hidden" id="eraiderID" name="eraiderID" value="{{ $teamMember->eraiderID }}"></input>

                        <input type="hidden" id="role" name="role" value="{{ $teamMember->role }}"></input>

                        <input type="hidden" id="email" name="email" value="{{ $teamMember->email }}"></input>

                        <input type="hidden" id="photo" name="photo" value="{{ $teamMember->photo }}"></input>

                        <input type="hidden" id="cv" name="cv" value="{{ $teamMember->cv }}"></input>
                        <!-- End of hidden inputs -->

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="first_name"
                                       type="text"
                                       name="first_name"
                                       value="{{ $teamMember->first_name }}">
                                <label for="first_name">First Name</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="last_name"
                                       type="text"
                                       name="last_name"
                                       value="{{ $teamMember->last_name }}">
                                <label for="last_name">Last Name</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="phone_number"
                                       type="text"
                                       name="phone_number"
                                       value="{{ $teamMember->phone_number }}">
                                <label for="phone_number">Phone Number</label>
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
                                           value="{{ $teamMember->office_hours }}"
                                           placeholder="MWF: 1:00pm to 3:00pm">
                                    <label class="active"
                                           for="office_hours">Office Hours</label>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="first_degree"
                                       type="text"
                                       name="first_degree"
                                       value="{{ $teamMember->first_degree }}">
                                <label for="first_degree">Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="second_degree"
                                       type="text"
                                       name="second_degree"
                                       value="{{ $teamMember->second_degree }}">
                                <label for="second_degree">Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="third_degree"
                                       type="text"
                                       name="third_degree"
                                       value="{{ $teamMember->third_degree }}">
                                <label for="third_degree">Degree</label>
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
                            <div class="input-field col s12">
                                <textarea id="awards"
                                          class="materialize-textarea"
                                          name="awards"
                                          value="">{{ $teamMember->awards }}</textarea>
                                <label for="awards">Awards</label>
                            </div>
                        </div>

                        @if($teamMember->photo)
                            <div class="row">
                                <div class="col s12 m6">
                                    <h4>Your Profile Photo</h4>
                                    <img class="materialboxed" width="400" src="{{ $teamMember->photo }}" alt="User Profile Photo">
                                </div>
                            </div>
                        @endif

                        @if($teamMember->role == 'faculty' && $teamMember->cv != null)
                            <div class="row">
                                <div class="col s12 m6">
                                    <h5>Your CV</h5>
                                    <a class="user-home-a" href="{{ $teamMember->cv }}" target="_blank"><p>{{ $teamMember->first_name }}-{{ $teamMember->last_name }}-CV</p></a>
                                </div>
                            </div>
                        @elseif($teamMember->role == 'faculty')
                            <div id="cv-area-before-faculty-user-upload" class="row">
                                <ul class="collapsible popout" data-collapsible="accordion">
                                    <li>
                                        <div id="add-faculty-cv-button" class="collapsible-header">
                                            <strong>Add Your CV</strong>
                                        </div>

                                        <div class="collapsible-body dropzone-accordion-body">
                                            <span>
                                                <div id="faculty-user-cv-dropzone" class="myDropzone dropzone">
                                                    <div class="dz-message" data-dz-message><span>Drag and Drop CV here or click to Upload CV</div>
                                                    <div id="preview-template" style="display: none;"></div>
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div id="cv-area-after-faculty-user-upload" class="row">
                                <div class="col s12 m6">
                                    <h5>Your CV</h5>
                                    <a id="cv-after-faculty-user-upload" class="user-home-a" href="" target="_blank"><p>{{ $teamMember->first_name }}-{{ $teamMember->last_name }}-CV</p></a>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col s12 m4">
                                <button class="btn waves-effect waves-light" type="submit" name="updateProfile">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        {{-- End of main content --}}

        <div id="eraiderID" data-field-id="{{ $teamMember->eraiderID }}"></div>

        @include('layouts.include-snippets.footer')

        @include('layouts.include-snippets.user-javascript')
    </body>
</html>
