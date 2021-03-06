
/**
 * First we will load all of this project's JavaScript dependencies
 * This gives a great starting point for building robust, powerful
 * web applications using Vue and Laravel.
 */

require('./bootstrap');
var Dropzone = require('./dropzone');
Dropzone.autoDiscover = false;

/**
 * Create a fresh Vue application instance. The instance has been attached to
 * the content section of the page. Vue Components are added as needed.
 */

const VueRouter = require('vue-router');
Vue.use(VueRouter);

// Vue component imports
import CreateAdministrator from './components/CreateAdministrator.vue';
import CreateFacultyMember from './components/CreateFacultyMember.vue';
import CreateStaffMember from './components/CreateStaffMember.vue';
import ShowBioRequests from './components/ShowBioRequests.vue';
import Home from './components/Home.vue';

// Setup Vue-router
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/admin-portal',
            component: CreateAdministrator
        },

        {
            path: '/admin-portal/create-faculty-member',
            component: CreateFacultyMember
        },

        {
            path: '/admin-portal/create-staff-member',
            component: CreateStaffMember
        },

        {
            path: '/admin-portal/change-bio-requests',
            component: ShowBioRequests
        }
    ]
});

// Initialize Vue
const app = new Vue({ router }).$mount('#admin-dashboard-vuejs-content');
