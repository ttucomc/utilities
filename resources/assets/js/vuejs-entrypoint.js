
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
import CreateNewsArticle from './components/CreateNewsArticle.vue';

// Setup Vue-router
const router = new VueRouter({
    routes: [
        {
            path: '/',
            component: CreateAdministrator
        },

        {
            path: '/create-faculty-member',
            component: CreateFacultyMember
        },

        {
            path: '/create-staff-member',
            component: CreateStaffMember
        },

        {
            path: '/create-news-article',
            component: CreateNewsArticle
        }
    ]
});

// Initialize Vue
const app = new Vue({ router }).$mount('#admin-dashboard-vuejs-content');
