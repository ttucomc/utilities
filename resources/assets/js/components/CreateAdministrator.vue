
<template>
    <div class="row">
        <div class="col s12 m6">
            <div class="card grey darken-3">
                <form role="form" action="#" method="POST">
                    <div class="card-content white-text">
                        <span class="card-title">Create New Administrator</span>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="first_name" class="validate" type="text" name="first_name" value="">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="last_name" class="validate" type="text" name="last_name" value="">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="email" class="validate" type="email" name="email" value="">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="email_repeat" class="validate" type="email" name="email_repeat" value="">
                                <label for="email_repeat">Re-enter Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="password" class="validate" type="password" name="password" value="">
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="password_repeat" class="validate" type="password" name="password_repeat" value="">
                                <label for="password_repeat">Re-enter Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <a href="#">Create</a>
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

            }
        },
        computed: {},
        ready: function () {},
        attached: function () {},
        methods: {},
        components: {}
    }
</script>

<style lang="css">

</style>
