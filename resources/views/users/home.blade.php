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
                    <li><a href="https://eraider.ttu.edu/signout.asp">Logout</a></li>
                </ul>

                <ul class="right hide-on-med-and-down">
                    <li><a href="/user-portal/{{ $teamMember->eraiderID }}"><i class="small material-icons left">perm_identity</i>Profile</a></li>
                    <li><a href="https://eraider.ttu.edu/signout.asp">Logout</a></li>
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
                    <p>Profile photos and CV's can be uploaded here without administrator approval.</p>

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

                        @if($teamMember->photo)
                            <div class="row">
                                <div class="col s12 m6">
                                    <h4>Your Profile Photo</h4>
                                    <img class="materialboxed" width="400" src="{{ $teamMember->photo }}" alt="User Profile Photo">
                                </div>
                            </div>
                        @else
                            <div id="profile-photo-area-before-user-upload" class="row">
                                <ul class="collapsible popout" data-collapsible="accordion">
                                    <li>
                                        <div id="add-profile-photo-button" class="collapsible-header">
                                            Add Your Profile Photo
                                        </div>
                                        <div class="collapsible-body dropzone-accordion-body">
                                            <span>
                                                <div id="user-profile-photo-dropzone" class="myDropzone dropzone">
                                                    <div class="dz-message" data-dz-message><span>Drag and Drop photo here or click to Upload photo</div>
                                                    <div id="preview-template" style="display: none;"></div>
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div id="profile-photo-area-after-user-upload" class="row">
                                <div class="col s12 m6">
                                    <h5>Your Profile Photo</h5>
                                    <img id="profile-photo-after-user-upload" class="materialboxed" width="400" src="" alt="User Profile Photo">
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
                                            Add Your CV
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
                    </form>
                </div>
            </section>
        </main>
        {{-- End of main content --}}

        @include('layouts.include-snippets.footer')

        @include('layouts.include-snippets.user-javascript')

        <div id="eraiderID" data-field-id="{{ $teamMember->eraiderID }}"></div>
        <script type="text/javascript">
            $(document).ready( function() {
                $('#profile-photo-area-after-user-upload').hide();
                $('#cv-area-after-faculty-user-upload').hide();

                $('#add-profile-photo-button').click(function() {
                    initializePhotoDropzone();
                });

                $('#add-faculty-cv-button').click(function() {
                    initializeFacultyCVDropzone();
                });

                var token = $('meta[name="token"]').attr('value');

                function initializeFacultyCVDropzone() {
                    $('#faculty-user-cv-dropzone').dropzone({
                        url: "api/team/store/faculty-team-member/cv",
                        paramName: 'cv',
                        maxFiles: 1,
                        maxFilesize: 3,
                        acceptedFiles: ".pdf",
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        init: function() {
                            var cvDropzone = this;

                            this.on('sending', function(file, xhr, formData) {
                                formData.append("eraiderID", $('#eraiderID').data("field-id"));
                            });

                            this.on('success', function(file, response) {
                                Materialize.toast("CV uploaded successfully", 4000, 'blue');

                                $('#cv-after-faculty-user-upload').attr("href", response.cvpath);

                                setTimeout(function() {
                                    $('#user-profile-photo-dropzone').hide();
                                }, 3000);

                                setTimeout(function() {
                                    $('#cv-area-before-faculty-user-upload').hide();
                                    $('#cv-area-after-faculty-user-upload').css("display", "block")
                                }, 4000);

                            });

                            this.on('error', function() {
                                Materialize.toast("CV upload failed", 4000, 'red');

                                setTimeout(function() {
                                    profilePhotoDropzone.removeAllFiles(true);
                                }, 3000);
                            });
                        }
                    });
                }

                function initializePhotoDropzone() {
                    $('#user-profile-photo-dropzone').dropzone({
                        url: "api/team/store/team-member/profile-photo",
                        paramName: 'profile-photo',
                        maxFiles: 1,
                        maxFilesize: 20,
                        acceptedFiles: "image/*",
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        init: function() {
                            var profilePhotoDropzone = this;

                            this.on('sending', function(file, xhr, formData) {
                                formData.append("eraiderID", $('#eraiderID').data("field-id"));
                            });

                            this.on('success', function(file, response) {
                                Materialize.toast("Profile photo uploaded successfully", 4000, 'blue');

                                $('#profile-photo-after-user-upload').attr("src", response.photopath);

                                setTimeout(function() {
                                    $('#user-profile-photo-dropzone').hide();
                                }, 3000);

                                setTimeout(function() {
                                    $('#profile-photo-area-before-user-upload').hide();
                                    $('#profile-photo-area-after-user-upload').css("display", "block")
                                }, 4000);

                            });

                            this.on('error', function() {
                                Materialize.toast("Profile photo upload failed", 4000, 'red');

                                setTimeout(function() {
                                    profilePhotoDropzone.removeAllFiles(true);
                                }, 3000);
                            });
                        }
                    });
                }
            });
        </script>
    </body>
</html>
