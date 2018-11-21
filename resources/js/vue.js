/*jshint esversion: 6 */

/**s
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
//const VuRouter = require('vue-router');
Vue.use(VueRouter);


//const userListComponent = Vue.component('user-list',require('./components/userList.vue'));
const itemList = Vue.component('item-list',require('./components/itemList.vue'));



const routes = [
    {path:'/menu', component: itemList},
    //{path:'/list', component: userListComponent},
];

const router = new VueRouter({
    routes
})


const app = new Vue({
    el: '#app',//indica o elemento que queremos que o vue substitua, onde começa tree DOM do vue
    router
});
