<template>
    <!-- Note: This component is no longer being used at the moment. The user side will be a normal server side application. This decision was made to allow for easier testing. -->

    <section id="home" class="row">
        <div class="col s12">
            <h1>{{ heading }}</h1>
            <p>
                Welcome to the College of Media &amp; Communication utilities. From here you can edit your faculty/staff bio on our site. Administrators are able to add and edit faculty/staff, create news articles and more.
            </p>
        </div>
        <div class="col s12">
            <h2>Get Started</h2>
        </div>
        <div class="col s12 m6">
            <div class="card grey lighten-3">
                <div class="card-content">
                    <span class="card-title"><i class="material-icons large">person</i><br />Faculty/Staff Bio</span>
                </div>
                <div class="card-action">
                    <a href="/eraider-sign-in">Edit your bio</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card grey lighten-3">
                <div class="card-content">
                    <span class="card-title"><i class="material-icons large">settings</i><br />Administrators</span>
                </div>
                <div class="card-action">
                    <a href="/admin-portal">Access admin portal</a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    export default {
        data() {
            return {
                heading: 'CoMC Utilities'
            }
        }
    }

</script>

<style lang="sass">

    #home {

        h2 {
            border-bottom: 1px solid #CCC;
        }

        .card {
            text-align: center;

            .card-action {

                a {
                    margin: 0;
                }
            }
        }
    }

</style>
