
<template>
    <div class="row">
        <div class="col m8 offset-m2">
            <div class="card grey lighten-4">
                <form id="admin-form"
                      v-on:submit.prevent="createAdmin()">
                    <div class="card-content">
                        <span class="card-title">Create New Administrator</span>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="first_name"
                                       v-model="adminData.first_name"
                                       type="text"
                                       name="first_name"
                                       value="">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="last_name"
                                       v-model="adminData.last_name"
                                       type="text"
                                       name="last_name"
                                       value="">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="email"
                                       v-model="adminData.email"
                                       class="validate"
                                       type="email"
                                       name="email"
                                       value=""
                                       placeholder="@ttu.edu">
                                <label for="email"
                                       data-error="Please enter a valid email address" >Email</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="email_repeat"
                                       v-model="adminData.repeatEmail"
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
                            <div class="input-field col s12 m6">
                                <input id="password"
                                       v-model="adminData.password"
                                       class="validate"
                                       type="password"
                                       name="password"
                                       value="">
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="password_repeat"
                                       v-model="adminData.repeatPassword"
                                       class="validate"
                                       type="password"
                                       name="password_repeat"
                                       value="">
                                <label for="password_repeat">Re-enter Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="waves-effect btn-flat button-text-color"
                                v-show="emailsMatch && passwordsMatch && emailIsValid && ! AJAXIcon"
                                @click="AJAXIcon = true"
                                type="submit"
                                name="create-admin"
                                >Create<i class="material-icons right">done</i></button>
                        <div class="error" v-show="! emailsMatch"><small>{{ emailErrorMsg }}</small></div>
                        <div class="error" v-show="! emailIsValid"><small>{{ emailNotValidMsg }}</small></div>
                        <div class="error" v-show="! passwordsMatch"><small>{{ passwordErrorMsg }}</small></div>
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
        data() {
            return {
                adminData: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    repeatEmail: '',
                    password: '',
                    repeatPassword: '',
                },

                AJAXIcon: false,

                successMsg: 'Admin created successfully',

                emailErrorMsg: 'Email fields must match',

                emailNotValidMsg: 'Email is not valid',

                passwordErrorMsg: 'Password fields must match'
            }
        },
        computed: {
            emailsMatch: function() {
                return this.adminData.email === this.adminData.repeatEmail &&
                        this.adminData.email.length != 0 &&
                        this.adminData.repeatEmail.length != 0;
            },

            emailIsValid: function() {
                return this.adminData.email.includes("@") &&
                        this.adminData.repeatEmail.includes("@");
            },

            passwordsMatch: function () {
                return this.adminData.password === this.adminData.repeatPassword &&
                        this.adminData.password.length != 0 &&
                        this.adminData.repeatPassword.length != 0;
            }
        },
        ready: function () {},
        attached: function () {},
        methods: {
            createAdmin(adminData) {
                const vm = this;

                vm.$http.post('api/admin/store', vm.adminData)
                .then((response) => {
                    vm.AJAXIcon = false;

                    vm.adminData.first_name = '';
                    vm.adminData.last_name = '';
                    vm.adminData.email = '';
                    vm.adminData.repeatEmail = '';
                    vm.adminData.password = '';
                    vm.adminData.repeatPassword = '';

                    $("#admin-form")[0].reset();
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
    .button-text-color {
        color:  green
    }

    .error {
        color: red
    }

    .success {
        color: green
    }
</style>
