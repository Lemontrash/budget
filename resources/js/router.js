import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/Home.vue';
import Registration from './components/Registration.vue';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'Home',
  },
  {
    path: '/registration',
    component: Registration,
    name: 'Registration',
  },
];

const router = new VueRouter({
  routes,
  // mode: 'history',
});

export default router;
