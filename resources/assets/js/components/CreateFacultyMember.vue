<template>
    <div class="row">
        <div class="col m8 offset-m2">
            <div class="card grey lighten-4">
                <form id="faculty-form"
                      v-on:submit.prevent="createFaculty()">
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
                            <div class="file-field input-field col s12 m6">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate"
                                           type="text"
                                           placeholder="Attach a photo">
                                </div>
                            </div>

                            <div class="input-field col s12 m6">
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
                                <input id="bachelor"
                                       v-model="facultyData.bachelor"
                                       type="text"
                                       name="bachelor"
                                       value="">
                                <label for="bachelor">Bachelor's Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="master"
                                       v-model="facultyData.master"
                                       type="text"
                                       name="master"
                                       value="">
                                <label for="master">Master's Degree</label>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="phd"
                                       v-model="facultyData.phd"
                                       type="text"
                                       name="phd"
                                       value="">
                                <label for="phd">Doctorate Degree</label>
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
                                <label for="bio">Courses</label>
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
                                <label for="bio">Research</label>
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
                            <div class="file-field input-field col s12">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate"
                                           type="text"
                                           placeholder="Attach CV">
                                </div>
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
    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                facultyData: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    repeatEmail: '',
                    photo: '',
                    title: '',
                    department: '',
                    room_number: '',
                    office_hours: '',
                    bachelor: '',
                    master: '',
                    phd: '',
                    social_handles: '',
                    bio: '',
                    courses: '',
                    research: '',
                    duties: '',
                    training: '',
                    awards: '',
                    cv: ''
                },

                AJAXIcon: false,

                successMsg: 'Staff member created successfully',

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
            },
        },
        ready: function () {},
        attached: function () {},
        methods: {
            createFaculty(facultyData) {
                const vm = this;

                vm.$http.post('api/team/store/faculty', vm.facultyData)
                .then((response) => {
                    vm.AJAXIcon = false;

                    vm.facultyData.first_name = '';
                    vm.facultyData.last_name = '';
                    vm.facultyData.email = '';
                    vm.facultyData.repeatEmail = '';
                    vm.facultyData.title = '';
                    vm.facultyData.department = '';
                    vm.facultyData.room_number = '';
                    vm.facultyData.office_hours = '';
                    vm.facultyData.bachelor = '';
                    vm.facultyData.master = '';
                    vm.facultyData.phd = '';
                    vm.facultyData.social_handles = '';
                    vm.facultyData.bio = '';
                    vm.facultyData.courses = '';
                    vm.facultyData.research = '';
                    vm.facultyData.duties = '';
                    vm.facultyData.training = '';
                    vm.facultyData.awards = '';
                    vm.facultyData.cv = '';

                    $("#faculty-form")[0].reset();
                    Materialize.toast(vm.successMsg, 4000, 'blue');
                }, (error) => {
                    vm.AJAXIcon = false;

                    $.each(error.body, function(key, value) {
                        Materialize.toast(value[0], 4000, 'red');
                    });
                });
            }
        },
        components: {}
    }
</script>

<style lang="sass">

</style>
