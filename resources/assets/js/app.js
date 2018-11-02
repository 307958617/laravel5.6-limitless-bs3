
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Snotify, { SnotifyPosition } from 'vue-snotify'
import 'vue-snotify/styles/material.css'
const options = {
    toast: {
        position: SnotifyPosition.rightTop
    }
};
Vue.use(Snotify,options);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('vue-datepicker', require('./components/VueDatePicker.vue'));
Vue.component('data-table-for-department', require('./components/DataTable_for_department.vue'));
Vue.component('data-table-for-user', require('./components/DataTable_for_user.vue'));
Vue.component('data-table-for-system-code-gender', require('./components/DataTable_for_system_code_gender.vue'));
Vue.component('system-code', require('./components/System_code.vue'));

const app = new Vue({
    el: '#app'
});
