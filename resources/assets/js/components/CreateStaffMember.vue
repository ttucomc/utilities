
<template>
    <div class="row">
        <div class="col m8 offset-m2">
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
                                <input id="email"
                                       v-model="staffData.email"
                                       class="validate"
                                       type="email"
                                       name="email"
                                       value=""
                                       placeholder="@ttu.edu">
                                <label for="email"
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
                                <label for="email_repeat"
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
                            <div class="file-field input-field col s12">
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
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                staffData: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    repeatEmail: '',
                    photo: '',
                    title: '',
                    department: '',
                    room_number: '',
                    bio: '',
                    duties: '',
                    training: ''
                },

                AJAXIcon: false,

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
        ready: function () {},
        attached: function () {},
        methods: {
            createStaff(staffData) {
                const vm = this;

                vm.$http.post('api/team/store/staff', vm.staffData)
                .then((response) => {
                    vm.AJAXIcon = false;

                    vm.staffData.first_name = '';
                    vm.staffData.last_name = '';
                    vm.staffData.email = '';
                    vm.staffData.repeatEmail = '';
                    vm.staffData.title = '';
                    vm.staffData.department = '';
                    vm.staffData.room_number = '';
                    vm.staffData.bio = '';
                    vm.staffData.duties = '';
                    vm.staffData.training = '';

                    $("#staff-form")[0].reset();
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
