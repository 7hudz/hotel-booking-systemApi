import { createRouter, createWebHistory } from "vue-router";

import Home from '../components/Home.vue';
import Rooms from '../components/Rooms.vue';
import Bookings from '../components/Bookings.vue';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';


const routes = [
    { path: '/', component: Home },
    { path: '/rooms', component: Rooms },
    { path: '/bookings', component: Bookings },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
];

 const router = createRouter({
    history: createWebHistory(),
    routes,
 })
 export default router