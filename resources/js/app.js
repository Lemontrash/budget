/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import router from './router.js'
import VueApexCharts from 'vue-apexcharts'
import VueCookies from 'vue-cookies'


//mixins
require('./mixins.js');
// TODO: import VueModal from 'vue-js-modal'

import App from './App.vue';

Vue.use(VueCookies)
Vue.use(VueApexCharts)
Vue.component('apexchart', VueApexCharts)

window.app = new Vue({
 router : router,
 render: h => h(App),
}).$mount('#app');
