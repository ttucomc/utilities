
/**
 * Create a fresh Vue application instance. The instance has been attached to
 * the content section of the page. Vue Components are added as needed.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#admin-dashboard-vuejs-content'
});
