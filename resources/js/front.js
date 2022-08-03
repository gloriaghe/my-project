require('./bootstrap');

//  window.Vue = require('vue');
import Vue from 'vue'; //importiamo la libreria vue
import VueRouter from 'vue-router'; //importiamo la libreria vue router

import App from './App.vue'; //importiamo il file App.vue

//importiamo i componenti delle pagine
import PageHome from './pages/PageHome.vue';
import PageBook from './pages/PageBook.vue';
import PageShow from './pages/PageShow.vue';
import Page404 from './pages/Page404.vue';

const routes = [
    {
        //home con post random
        path: '/',
        name: 'home',
        component: PageHome,
    },
    {
        //tutti i post
        path: '/book',
        name: 'book',
        component: PageBook,
    },
    {
        //pagina di dettaglio dinamica dei post
        path: '/book/:book',
        name: 'show',
        component: PageShow,
        props: true //per le rotte dinamiche
    },{
        path: '*',
        name: 'page404',
        component: Page404,
    }
];
const router = new VueRouter({
    routes,
    mode: 'history',
});

Vue.use(VueRouter); //diciamo a vue di usare il pluggin vue router




const app = new Vue({
    el: '#root',
    render: h => h(App),
    router, //diciamo avue di inizializzare la nostra app usando il router
});
