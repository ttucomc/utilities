
<template>
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card grey lighten-4">
                <form v-on:submit.prevent="createAdmin()">
                    <div class="card-content">
                        <span class="card-title">Create New Administrator</span>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input v-model="adminData.first_name" id="first_name" class="validate" type="text" name="first_name" value="">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input v-model="adminData.last_name" id="last_name" class="validate" type="text" name="last_name" value="">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input v-model="adminData.email" id="email" class="validate" type="email" name="email" value="">
                                <label data-error="Please enter a valid email address" for="email">Email</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input v-model="adminData.repeatEmail" id="email_repeat" class="validate" type="email" name="email_repeat" value="">
                                <label data-error="Please enter a valid email address" for="email_repeat">Re-enter Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input v-model="adminData.password" id="password" class="validate" type="password" name="password" value="">
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input v-model="adminData.repeatPassword" id="password_repeat" class="validate" type="password" name="password_repeat" value="">
                                <label for="password_repeat">Re-enter Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="waves-effect btn-flat button-text-color" type="submit" name="create-admin" v-show="emailsMatch && passwordsMatch">Create<i class="material-icons right">done</i></button>
                        <div class="error" v-show="! emailsMatch"><small>{{ emailErrorMsg }}</small></div>
                        <div class="error" v-show="! passwordsMatch"><small>{{ passwordErrorMsg }}</small></div>
                        <div class="success" v-show="adminCreated">{{ successMsg }}</div>

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

                adminCreated: false,

                successMsg: 'Admin has been successfully created',

                emailErrorMsg: 'Email fields must match',

                passwordErrorMsg: 'Password fields must be match'
            }
        },
        computed: {
            emailsMatch: function() {
                return this.adminData.email === this.adminData.repeatEmail &&
                        this.adminData.email.length != 0 &&
                        this.adminData.repeatEmail.length != 0;
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

                vm.$http.post('api/admin/create', vm.adminData)
                .then((newAdmin) => {
                    vm.adminData.first_name = '';
                    vm.adminData.last_name = '';
                    vm.adminData.email = '';
                    vm.adminData.repeatEmail = '';
                    vm.adminData.password = '';
                    vm.adminData.repeatPassword = '';

                    vm.adminCreated = true;
                }, (error) => {
                    // handle error
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
