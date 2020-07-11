import Vue from 'vue'
import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import { routes } from './routes';
import App from './components/App'

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});
new Vue({
    el: '#app',
    router,
});

