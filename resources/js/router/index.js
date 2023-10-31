import { createRouter, createWebHistory } from "vue-router";
import Login from '../components/Login.vue';
import Dashboard from '../components/Dashboard.vue';
import Tracking from '../components/Tracking.vue';
import ResiTracking from '../components/ResiTracking.vue';
import ContactListComponent from '../views/ContactListComponent.vue';

const routes = [
    {
        path: '/',
        component: Login
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/tracking',
        name: 'tracking',
        component: Tracking
    },
    {
        path: '/resi-tracking',
        name: 'resi-tracking',
        component: ResiTracking
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
