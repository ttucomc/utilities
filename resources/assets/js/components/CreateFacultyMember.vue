<template>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card grey lighten-4">
                <form id="faculty-form" enctype="multipart/form-data" v-on:submit.prevent="createFaculty()">
                    <div class="card-content">
                        <span class="card-title">Create New Faculty Member</span>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="first_name"
                                       v-model="facultyData.first_name"
                                       type="text"
                                       name="first_name"
                                       value="">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="last_name"
                                       v-model="facultyData.last_name"
                                       type="text"
                                       name="last_name"
                                       value="">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="eraiderID"
                                       v-model="facultyData.eraiderID"
                                       type="text"
                                       name="eraiderID"
                                       value="">
                                <label for="eraiderID">eRaider ID</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="phone_number"
                                       v-model="facultyData.phone_number"
                                       type="text"
                                       name="phone_number"
                                       value="">
                                <label for="phone_number">Phone Number</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="email"
                                       v-model="facultyData.email"
                                       class="validate"
                                       type="email"
                                       name="email"
                                       value=""
                                       placeholder="@ttu.edu">
                                <label class="active"
                                       for="email"
                                       data-error="Please enter a valid email address">Email</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="email_repeat"
                                       v-model="facultyData.repeatEmail"
                                       class="validate"
                                       type="email"
                                       name="email_repeat"
                                       value=""
                                       placeholder="@ttu.edu">
                                <label class="active"
                                       for="email_repeat"
                                       data-error="Please enter a valid email address">Re-enter Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="title"
                                       v-model="facultyData.title"
                                       type="text"
                                       name="title"
                                       value="">
                                <label for="title">Title</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="department"
                                       v-model="facultyData.department"
                                       type="text"
                                       name="department"
                                       value="">
                                <label for="department">Department</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="room_number"
                                       v-model="facultyData.room_number"
                                       type="text"
                                       name="room_number"
                                       value="">
                                <label for="room_number">Room Number</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="office_hours"
                                       v-model="facultyData.office_hours"
                                       type="text"
                                       name="office_hours"
                                       value=""
                                       placeholder="MWF: 1:00pm to 3:00pm">
                                <label class="active"
                                       for="office_hours">Office Hours</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="first_degree"
                                       v-model="facultyData.first_degree"
                                       type="text"
                                       name="first_degree"
                                       value="">
                                <label for="first_degree">First Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="second_degree"
                                       v-model="facultyData.second_degree"
                                       type="text"
                                       name="second_degree"
                                       value="">
                                <label for="second_degree">Second Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="third_degree"
                                       v-model="facultyData.third_degree"
                                       type="text"
                                       name="third_degree"
                                       value="">
                                <label for="third_degree">Third Degree</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="social-handles"
                                          v-model="facultyData.social_handles"
                                          class="materialize-textarea"
                                          name="social-handles"
                                          value=""></textarea>
                                <label for="social-handles">Social Handles | Website</label>
                             </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="courses"
                                          v-model="facultyData.courses"
                                          class="materialize-textarea"
                                          name="courses"
                                          value=""></textarea>
                                <label for="courses">Courses</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="bio"
                                          v-model="facultyData.bio"
                                          class="materialize-textarea"
                                          name="bio"
                                          value=""></textarea>
                                <label for="bio">Bio</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="research"
                                          v-model="facultyData.research"
                                          class="materialize-textarea"
                                          name="research"
                                          value=""></textarea>
                                <label for="research">Research</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="duties"
                                          v-model="facultyData.duties"
                                          class="materialize-textarea"
                                          name="duties"
                                          value=""></textarea>
                                <label for="duties">Duties</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="training"
                                          v-model="facultyData.training"
                                          class="materialize-textarea"
                                          name="training"
                                          value=""></textarea>
                                <label for="training">Training</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="awards"
                                          v-model="facultyData.awards"
                                          class="materialize-textarea"
                                          name="awards"
                                          value=""></textarea>
                                <label for="awards">Awards</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="waves-effect btn-flat button-text-color"
                                v-show="emailsMatch && emailIsValid && ! AJAXIcon"
                                @click="AJAXIcon = true"
                                type="submit"
                                name="create-faculty"
                                >Create<i class="material-icons right">done</i></button>
                        <div class="error" v-show="! emailsMatch"><small>{{ emailErrorMsg }}</small></div>
                        <div class="error" v-show="! emailIsValid"><small>{{ emailNotValidMsg }}</small></div>
                        <div class="preloader-wrapper small active"
                             v-show="AJAXIcon">
                            <div class="spinner-layer spinner-blue-only">
                              <div class="circle-clipper left">
                                <div class="circle"></div>
                              </div><div class="gap-patch">
                                <div class="circle"></div>
                              </div><div class="circle-clipper right">
                                <div class="circle"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex-centered col s12">
            <button class="waves-effect btn"
                    v-show="! AJAXIcon"
                    style="margin: 2rem 0 2rem 0;"
                    @click="reloadPage"
                    type="submit"
                    name="reloadButton"
                    >Finished with File Uploads</button>
        </div>

        <div id="faculty-cv-dropzone-area" class="col s12 m6 offset-m3">
            <h5>Add CV for: {{ newFacultyMemberFirstName }} {{ newFacultyMemberLastName }}</h5>
            <div id="faculty-cv-dropzone" class="myDropzone dropzone">
                <div class="dz-message" data-dz-message><span>Drag and Drop CV here or click to Upload CV</span><br><span class="faculty-upload-constraint"><small>You must first create the faculty member to upload a CV</small></span></div>
                <div id="preview-template" style="display: none;"></div>
            </div>
        </div>

        <div id="faculty-profile-photo-dropzone-area" class="col s12 m6 offset-m3">
            <h5>Add Profile Photo for: {{ newFacultyMemberFirstName }} {{ newFacultyMemberLastName }}</h5>
            <div id="faculty-profile-photo-dropzone" class="myDropzone dropzone">
                <div class="dz-message" data-dz-message><span>Drag and Drop photo here or click to Upload photo</span><br><span class="faculty-upload-constraint"><small>You must first create the faculty member to upload a profile photo</small></span></div>
                <div id="preview-template" style="display: none;"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
                facultyData: {
                    first_name: '',
                    last_name: '',
                    eraiderID: '',
                    email: '',
                    phone_number: '',
                    repeatEmail: '',
                    title: '',
                    department: '',
                    room_number: '',
                    office_hours: '',
                    first_degree: '',
                    second_degree: '',
                    third_degree: '',
                    social_handles: '',
                    bio: '',
                    courses: '',
                    research: '',
                    duties: '',
                    training: '',
                    awards: ''
                },

                AJAXIcon: false,

                newFacultyMemberID: '',

                newFacultyMemberFirstName: '',

                newFacultyMemberLastName: '',

                successMsg: 'Faculty member created successfully',

                emailErrorMsg: 'Email fields must match',

                emailNotValidMsg: 'Email is not valid'
            }
        },

        computed: {
            emailsMatch: function() {
                return this.facultyData.email === this.facultyData.repeatEmail &&
                        this.facultyData.email.length != 0 &&
                        this.facultyData.repeatEmail.length != 0;
            },

            emailIsValid: function() {
                return this.facultyData.email.includes("@") &&
                        this.facultyData.repeatEmail.includes("@");
            }
        },

        mounted: () => {},

        created: () => {},

        attached: () => {},

        methods: {
            createFaculty(facultyData) {
                const vm = this;

                vm.$http.post('api/team/store/faculty', vm.facultyData)
                .then((response) => {
                    vm.AJAXIcon = false;

                    $('.faculty-upload-constraint').hide();

                    vm.newFacultyMemberID = response.body.id;

                    vm.newFacultyMemberFirstName = vm.facultyData.first_name;
                    vm.newFacultyMemberLastName = vm.facultyData.last_name;

                    vm.facultyData.first_name = '';
                    vm.facultyData.last_name = '';
                    vm.facultyData.eraiderID = '';
                    vm.facultyData.email = '';
                    vm.facultyData.phone_number = '';
                    vm.facultyData.repeatEmail = '';
                    vm.facultyData.title = '';
                    vm.facultyData.department = '';
                    vm.facultyData.room_number = '';
                    vm.facultyData.office_hours = '';
                    vm.facultyData.first_degree = '';
                    vm.facultyData.second_degree = '';
                    vm.facultyData.third_degree = '';
                    vm.facultyData.social_handles = '';
                    vm.facultyData.bio = '';
                    vm.facultyData.courses = '';
                    vm.facultyData.research = '';
                    vm.facultyData.duties = '';
                    vm.facultyData.training = '';
                    vm.facultyData.awards = '';
                    vm.facultyData.cv = '';

                    $('#faculty-form')[0].reset();
                    Materialize.updateTextFields();
                    Materialize.toast(vm.successMsg, 4000, 'blue');

                    var token = $('meta[name="token"]').attr('value');

                    // Setup dropzone for CV
                    $('#faculty-cv-dropzone').dropzone({
                        url: "api/team/store/faculty/cv",
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
                                formData.append("newFacultyMemberID", vm.newFacultyMemberID);
                            });

                            this.on('success', function() {
                                Materialize.toast("CV uploaded successfully", 4000, 'blue');
                                // Materialize.toast("This page will reload shortly to clear all dropzone form data.", 4000, 'blue');

                                // vm.newFacultyMemberFirstName = '';
                                // vm.newFacultyMemberLastName = '';
                                // vm.newFacultyMemberID = '';

                                setTimeout(function() {
                                    cvDropzone.removeAllFiles(true);
                                }, 3000);
                                setTimeout(function() {
                                    $('#faculty-cv-dropzone-area').hide();
                                }, 4500);
                                // setTimeout(function() {
                                //     location.reload();
                                // }, 5750);
                            });

                            this.on('error', function() {
                                Materialize.toast("CV uploaded failed", 4000, 'red');
                                Materialize.toast("You can try again or try to upload the CV from the faculty member edit page.", 4000, 'red');

                                setTimeout(function() {
                                    cvDropzone.removeAllFiles(true);
                                }, 3000);
                            });
                        }
                    });

                    // Setup dropzone for profile photo
                    $('#faculty-profile-photo-dropzone').dropzone({
                        url: "api/team/store/faculty/profile-photo",
                        paramName: 'profile-photo',
                        maxFiles: 1,
                        maxFilesize: 1,
                        acceptedFiles: "image/*",
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        init: function() {
                            var profilePhotoDropzone = this;

                            this.on('sending', function(file, xhr, formData) {
                                formData.append("newFacultyMemberID", vm.newFacultyMemberID);
                            });

                            this.on('success', function() {
                                Materialize.toast("Profile photo uploaded successfully", 4000, 'blue');
                                // Materialize.toast("This page will reload shortly to clear all dropzone form data.", 4000, 'blue');
                                //
                                // vm.newFacultyMemberFirstName = '';
                                // vm.newFacultyMemberLastName = '';
                                // vm.newFacultyMemberID = '';

                                setTimeout(function() {
                                    profilePhotoDropzone.removeAllFiles(true);
                                }, 3000);
                                setTimeout(function() {
                                    $('#faculty-profile-photo-dropzone-area').hide();
                                }, 4500);
                                // setTimeout(function() {
                                //     location.reload();
                                // }, 5750);
                            });

                            this.on('error', function() {
                                Materialize.toast("Profile photo upload failed", 4000, 'red');
                                Materialize.toast("You can try again or try to upload the profile photo from the faculty member edit page.", 4000, 'red');

                                setTimeout(function() {
                                    profilePhotoDropzone.removeAllFiles(true);
                                }, 3000);
                            });
                        }
                    });
                }, (error) => {
                    vm.AJAXIcon = false;

                    $.each(error.body, function(key, value) {
                        Materialize.toast(value[0], 4000, 'red');
                    });
                });
            },

            reloadPage() {
                location.reload();
            }
        },

        components: {}
    }
</script>

<style lang="sass">
    #faculty-cv-dropzone-area {
        margin-bottom: 4rem;
    }

    .flex-centered {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .myDropzone {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 150px;
        border: 2px solid #C00;
    }

    span.faculty-upload-constraint {
        font-weight: bold;
    }
</style>
