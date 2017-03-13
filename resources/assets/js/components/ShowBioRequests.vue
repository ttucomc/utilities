<template>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h4 style="margin-bottom: 2rem;">Pending requests:</h4>

            <ul class="collapsible popout" data-collapsible="accordion">
                <li class="bioRequest-accordion" v-for="bioRequest in bioRequests.changeBioRequests">
                    <div class="collapsible-header">
                        <i class="material-icons">swap_vert</i>
                            {{ bioRequest.first_name }} {{ bioRequest.last_name }}
                    </div>

                    <div class="collapsible-body">
                        <form id="request-form" v-on:submit.prevent="updateBio(bioRequest)">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input id="first_name"
                                           v-model="bioRequest.first_name"
                                           type="text"
                                           name="first_name"
                                           value="bioRequest.first_name">
                                    <label class="active" for="first_name">First Name</label>
                                </div>

                                <div class="input-field col s12 m6">
                                    <input id="last_name"
                                           v-model="bioRequest.last_name"
                                           type="text"
                                           name="last_name"
                                           value="bioRequest.last_name">
                                    <label class="active" for="last_name">Last Name</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title"
                                           v-model="bioRequest.title"
                                           type="text"
                                           name="title"
                                           value="bioRequest.title">
                                    <label class="active" for="title">Title</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input id="department"
                                           v-model="bioRequest.department"
                                           type="text"
                                           name="department"
                                           value="bioRequest.department">
                                    <label class="active" for="department">Department</label>
                                </div>

                                <div class="input-field col s12 m6">
                                    <input id="phone_number"
                                           v-model="bioRequest.phone_number"
                                           type="text"
                                           name="phone_number"
                                           value="bioRequest.phone_number">
                                    <label class="active" for="phone_number">Phone Number</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input id="room_number"
                                           v-model="bioRequest.room_number"
                                           type="text"
                                           name="room_number"
                                           value="bioRequest.room_number">
                                    <label class="active" for="room_number">Room Number</label>
                                </div>

                                <div class="input-field col s12 m6">
                                    <input id="office_hours"
                                           v-model="bioRequest.office_hours"
                                           type="text"
                                           name="office_hours"
                                           value="bioRequest.office_hours">
                                    <label class="active" for="office_hours">Office Hours</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="first_degree"
                                           v-model="bioRequest.first_degree"
                                           type="text"
                                           name="first_degree"
                                           value="bioRequest.first_degree">
                                    <label class="active" for="first_degree">First Degree</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="second_degree"
                                           v-model="bioRequest.second_degree"
                                           type="text"
                                           name="second_degree"
                                           value="bioRequest.second_degree">
                                    <label class="active" for="second_degree">Second Degree</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="third_degree"
                                           v-model="bioRequest.third_degree"
                                           type="text"
                                           name="third_degree"
                                           value="bioRequest.third_degree">
                                    <label class="active" for="third_degree">Third Degree</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="social-handles"
                                              v-model="bioRequest.social_handles"
                                              class="materialize-textarea"
                                              name="social-handles"
                                              value="bioRequest.social_handles"></textarea>
                                    <label class="active" for="social-handles">Social Handles | Website</label>
                                 </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="bio"
                                              v-model="bioRequest.bio"
                                              class="materialize-textarea"
                                              name="bio"
                                              value="bioRequest.bio"></textarea>
                                    <label class="active" for="bio">Bio</label>
                                </div>
                            </div>

                            <div v-if="bioRequest.position === 'faculty'">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="courses"
                                                  v-model="bioRequest.courses"
                                                  class="materialize-textarea"
                                                  name="courses"
                                                  value="bioRequest.courses"></textarea>
                                        <label class="active" for="courses">Courses</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="research"
                                                  v-model="bioRequest.research"
                                                  class="materialize-textarea"
                                                  name="research"
                                                  value="bioRequest.research"></textarea>
                                        <label class="active" for="research">Research</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="duties"
                                              v-model="bioRequest.duties"
                                              class="materialize-textarea"
                                              name="duties"
                                              value="bioRequest.duties"></textarea>
                                    <label class="active" for="duties">Duties</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="awards"
                                              v-model="bioRequest.awards"
                                              class="materialize-textarea"
                                              name="awards"
                                              value="bioRequest.awards"></textarea>
                                    <label class="active" for="awards">Awards</label>
                                </div>
                            </div>

                            <button class="waves-effect btn-flat update-bio-button-color"
                                    v-show="! AJAXIcon"
                                    @click="AJAXIcon = true"
                                    type="submit"
                                    name="update-bio"
                                    >Update<i class="material-icons right">done</i></button>
                            <div class="progress" v-show="AJAXIcon">
                                <div class="indeterminate"></div>
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
                bioRequests: {},

                AJAXIcon: false,

                show: true
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
                    vm.bioRequests = response.body;

                    $('.collapsible').collapsible();
                }, (error) => {
                    Materialize.toast("There was an error fetching the bio requests. Please consult the console log", 4000, 'blue');

                    console.log(error.body);
                });
            },

            updateBio(bioRequest) {
                const vm = this;

                vm.$http.put('/admin-portal/api/update-team-member-bio/', bioRequest)
                .then((response) => {
                    vm.AJAXIcon = false;

                    let iLen = vm.bioRequests.changeBioRequests.length;
                    for(let i = 0; i < iLen; i++) {
                        if(vm.bioRequests.changeBioRequests[i].eraiderID == response.body.eraiderID) {
                            vm.bioRequests.changeBioRequests.splice(i, 1);

                            document.querySelectorAll('.numChangeBioRequests').forEach(function(obj) {
                                obj.innerHTML--;
                            });
                        }
                    }

                    Materialize.toast(response.body.name + "'s bio updated successfully", 4000, 'blue');

                }, (error) => {
                    vm.AJAXIcon = false;

                    $.each(error.body, function(key, value) {
                        Materialize.toast(value[0], 4000, 'red');
                    });
                });
            }
        }
    }
</script>

<style lang="sass">
    .collapsible.popout>li.bioRequest-accordion {
        margin: 1rem 24px;
    }

    .bioRequest-accordion div.collapsible-body {
        padding: 2rem;
    }

    .update-bio-button-color {
        color: #00acff;
    }

    .progress .indeterminate {
        background-color: #00acff;
    }

    .slide-fade-enter-active {
      transition: all 1s ease;
    }
    .slide-fade-leave-active {
      transition: all 1s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active for <2.1.8 */ {
      transform: translateX(10px);
      opacity: 0;
    }
</style>
