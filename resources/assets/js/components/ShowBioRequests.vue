<template>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h4 style="margin-bottom: 2rem;">Pending requests:</h4>

            <ul class="collapsible popout" data-collapsible="accordion">
                <li class="request-accordion" v-for="request in requests">
                    <div class="collapsible-header">
                        <i class="material-icons">swap_vert</i>
                        {{ request.first_name }} {{ request.last_name }}
                    </div>

                    <div class="collapsible-body">
                        <form id="request-form" v-on:submit.prevent="updateBio(request.eraiderID)">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title"
                                           v-model="request.title"
                                           type="text"
                                           name="title"
                                           value="request.title">
                                    <label class="active" for="title">Title</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="department"
                                           v-model="request.department"
                                           type="text"
                                           name="department"
                                           value="request.department">
                                    <label class="active" for="department">Department</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input id="room_number"
                                           v-model="request.room_number"
                                           type="text"
                                           name="room_number"
                                           value="request.room_number">
                                    <label class="active" for="room_number">Room Number</label>
                                </div>

                                <div class="input-field col s12 m6">
                                    <input id="office_hours"
                                           v-model="request.office_hours"
                                           type="text"
                                           name="office_hours"
                                           value="request.office_hours">
                                    <label class="active" for="office_hours">Office Hours</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                requests: []
            }
        },
        computed: {

        },
        mounted: function() {
            this.getBioRequests();
        },
        created: function() {},
        methods: {
            getBioRequests() {
                const vm = this;

                vm.$http.get('/admin-portal/api/get-bio-requests')
                .then((response) => {
                    vm.requests = response.body;
                }, (error) => {
                    console.log(error);
                });
            },

            updateBio(eraiderID) {
                const vm = this;

                // update bio of user
            }
        }
    }
</script>

<style lang="sass">
    ul li.request-accordion {
        margin: 1rem 24px;
    }

    .collapsible-body {
        padding: 1rem;
    }
</style>
