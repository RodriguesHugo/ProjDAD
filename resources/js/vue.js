/*jshint esversion: 6 */

/**s
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import store from './stores/global-store';

Vue.use(VueRouter);

const itemList = Vue.component('item-list',require('./components/itemList.vue'));
const login = Vue.component('login', require('./components/login.vue'));
const logout = Vue.component('logout', require('./components/logout.vue'));
const registerAccount = Vue.component('registerAccount', require('./components/workers/registerAccount.vue'));
const confirmAccount = Vue.component('confirm-account', require('./components/workers/confirmAccount.vue'));


const routes = [
    {path:'/menu', component: itemList},
    {path:'/login', component: login},
    {path:'/logout', component: logout},
    {path:'/workers/registerAccount', component: registerAccount},
    {path:'/workers/confirmAccount', component: confirmAccount},

];

const router = new VueRouter({
    routes
})


const app = new Vue({
    el: '#app',//indica o elemento que queremos que o vue substitua, onde começa tree DOM do vue
    router,
    store
});
