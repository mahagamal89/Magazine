
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./classie');
require('./custom');
require('./form-classie');
require('./jquery-ui');
require('./jquery.mCustomScrollbar.concat.min');
require('./jquery.min');
require('./jquery.newsTicker');
require('./RYPP');
require('./owl');
require('./wow.min');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });
