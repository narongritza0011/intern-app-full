/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Import View Router
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


Vue.use(VueAxios, axios);
Vue.use(VueRouter)


// Install BootstrapVue
Vue.use(BootstrapVue)

import 'bootstrap-vue/dist/bootstrap-vue.css'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".3
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('payment-index', require('./components/payment/IndexComponent.vue').default);

Vue.component('grade-group', require('./components/setting/GradeGroup.vue').default);
Vue.component('student-subject', require('./components/student/Subject.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.mixin({
    data: function() {
      return {
        monthGlobal: [
            { id: '01', name: 'January' },
            { id: '02', name: 'February' },
            { id: '03', name: 'March' },
            { id: '04', name: 'April' },
            { id: '05', name: 'May' },
            { id: '06', name: 'June' },
            { id: '07', name: 'July' },
            { id: '08', name: 'August' },
            { id: '09', name: 'September' },
            { id: '10', name: 'October' },
            { id: '11', name: 'November' },
            { id: '12', name: 'December' },
        ]
      }
    }
})

const app = new Vue({
    el: '#app',
});
