<template>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card grey lighten-4">
                <form id="staff-form"
                      v-on:submit.prevent="createStaff()">
                    <div class="card-content">
                        <span class="card-title">Create New Staff Member</span>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="first_name"
                                       v-model="staffData.first_name"
                                       type="text"
                                       name="first_name"
                                       value="">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="last_name"
                                       v-model="staffData.last_name"
                                       type="text"
                                       name="last_name"
                                       value="">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="eraiderID"
                                       v-model="staffData.eraiderID"
                                       type="text"
                                       name="eraiderID"
                                       value="">
                                <label for="eraiderID">eRaider ID</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="email"
                                       v-model="staffData.email"
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
                                       v-model="staffData.repeatEmail"
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
                                       v-model="staffData.title"
                                       type="text"
                                       name="title"
                                       value="">
                                <label for="title">Title</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="department"
                                       v-model="staffData.department"
                                       type="text"
                                       name="department"
                                       value="">
                                <label for="department">Department</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="room_number"
                                       v-model="staffData.room_number"
                                       type="text"
                                       name="room_number"
                                       value="">
                                <label for="room_number">Room Number</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="bio"
                                          v-model="staffData.bio"
                                          class="materialize-textarea"
                                          name="bio"
                                          value=""></textarea>
                                <label for="bio">Bio</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="duties"
                                          v-model="staffData.duties"
                                          class="materialize-textarea"
                                          name="duties"
                                          value=""></textarea>
                                <label for="duties">Duties</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="training"
                                          v-model="staffData.training"
                                          class="materialize-textarea"
                                          name="training"
                                          value=""></textarea>
                                <label for="training">Training</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="waves-effect btn-flat button-text-color"
                                v-show="emailsMatch && emailIsValid && ! AJAXIcon"
                                @click="AJAXIcon = true"
                                type="submit"
                                name="create-staff"
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
                    style="margin: 2rem 0;"
                    @click="reloadPage"
                    type="submit"
                    name="reloadButton"
                    >Finished with File Uploads</button>
        </div>

        <div id="staff-profile-photo-dropzone-area" class="col s12 m6 offset-m3">
            <h5>Add Profile Photo for: {{ newStaffMemberFirstName }} {{ newStaffMemberLastName }}</h5>
            <div id="staff-profile-photo-dropzone" class="myDropzone dropzone">
                <div class="dz-message" data-dz-message><span>Drag and Drop photo here or click to Upload photo</span><br><span class="staff-upload-constraint"><small>You must first create the staff member to upload a profile photo</small></span></div>
                <div id="preview-template" style="display: none;"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                staffData: {
                    first_name: '',
                    last_name: '',
                    eraiderID: '',
                    email: '',
                    repeatEmail: '',
                    title: '',
                    department: '',
                    room_number: '',
                    bio: '',
                    duties: '',
                    training: ''
                },

                AJAXIcon: false,

                newStaffMemberID: '',

                newStaffMemberFirstName: '',

                newStaffMemberLastName: '',

                successMsg: 'Staff member created successfully',

                emailErrorMsg: 'Email fields must match',

                emailNotValidMsg: 'Email is not valid'
            }
        },

        computed: {
            emailsMatch: function() {
                return this.staffData.email === this.staffData.repeatEmail &&
                        this.staffData.email.length != 0 &&
                        this.staffData.repeatEmail.length != 0;
            },

            emailIsValid: function() {
                return this.staffData.email.includes("@") &&
                        this.staffData.repeatEmail.includes("@");
            },
        },

        mounted: () => {},

        ready: () => {},

        attached: () => {},

        methods: {
            createStaff(staffData) {
                const vm = this;

                vm.$http.post('api/team/store/staff', vm.staffData)
                .then((response) => {
                    vm.AJAXIcon = false;

                    $('.staff-upload-constraint').hide();

                    vm.newStaffMemberID = response.body.id;

                    vm.newStaffMemberFirstName = vm.staffData.first_name;
                    vm.newStaffMemberLastName = vm.staffData.last_name;

                    vm.staffData.first_name = '';
                    vm.staffData.last_name = '';
                    vm.staffData.eraiderID = '';
                    vm.staffData.email = '';
                    vm.staffData.repeatEmail = '';
                    vm.staffData.title = '';
                    vm.staffData.department = '';
                    vm.staffData.room_number = '';
                    vm.staffData.bio = '';
                    vm.staffData.duties = '';
                    vm.staffData.training = '';

                    $("#staff-form")[0].reset();
                    Materialize.updateTextFields();
                    Materialize.toast(vm.successMsg, 4000, 'blue');

                    // Setup dropzone for CV
                    var token = $('meta[name="token"]').attr('value');
                    $('#staff-profile-photo-dropzone').dropzone({
                        url: "api/team/store/staff/profile-photo",
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
                                formData.append("newStaffMemberID", vm.newStaffMemberID);
                            });

                            this.on('success', function() {
                                Materialize.toast("Profile photo uploaded successfully", 4000, 'blue');
                                Materialize.toast("This page will reload shortly to clear all dropzone form data.", 4000, 'blue');

                                vm.newStaffMemberFirstName = '';
                                vm.newStaffMemberLastName = '';
                                vm.newStaffMemberID = '';

                                setTimeout(function() {
                                    profilePhotoDropzone.removeAllFiles(true);
                                }, 3000);
                                setTimeout(function() {
                                    $('#staff-profile-photo-dropzone-area').hide();
                                }, 4500);
                                setTimeout(function() {
                                    location.reload();
                                }, 5750);
                            });

                            this.on('error', function() {
                                Materialize.toast("Profile photo upload failed", 4000, 'red');
                                Materialize.toast("You can try again or try to upload the profile photo from the staff member edit page.", 4000, 'red');

                                setTimeout(function() {
                                    cvDropzone.removeAllFiles(true);
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
    .myDropzone {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 150px;
        border: 2px solid #C00;
    }

    span.staff-upload-constraint {
        font-weight: bold;
    }
</style>
