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
import Paginate from 'vuejs-paginate';

Vue.use(VueRouter);

const itemList = Vue.component('item-list',require('./components/itemList.vue'));
const login = Vue.component('login', require('./components/login.vue'));
const logout = Vue.component('logout', require('./components/logout.vue'));
Vue.component('paginate', Paginate);


const routes = [
    {path:'/menu', component: itemList},
    {path:'/login', component: login},
    {path:'/logout', component: logout},

];

const router = new VueRouter({
    routes
})


const app = new Vue({
    el: '#app',//indica o elemento que queremos que o vue substitua, onde começa tree DOM do vue
    router,
    store
});
