import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/Home.vue';
import Registration from './components/Registration.vue';
import MyAccount from './components/MyAccount.vue';

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
  {
    path: '/my-account',
    component: MyAccount,
    name: 'my-account',
  },

];

const router = new VueRouter({
  routes,
  // mode: 'history',
});

export default router;
