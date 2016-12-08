
<template>
    <div class="row">
        <div class="col s12 m6">
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
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="email_repeat" class="validate" type="email" name="email_repeat" value="">
                                <label for="email_repeat">Re-enter Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input v-model="adminData.password" id="password" class="validate" type="password" name="password" value="">
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="password_repeat" class="validate" type="password" name="password_repeat" value="">
                                <label for="password_repeat">Re-enter Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="waves-effect btn-flat button-text-color" type="submit" name="create-admin">Create<i class="material-icons right">done</i></button>
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
                    password: '',
                },

                adminCreated: false
            }
        },
        computed: {},
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
                    vm.adminData.password = '';
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
</style>
