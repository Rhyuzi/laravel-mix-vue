import { createRouter, createWebHistory } from "vue-router";
import Login from '../components/Login.vue';
import Dashboard from '../components/Dashboard.vue';
import ContactListComponent from '../views/ContactListComponent.vue';

const routes = [
    {
        path: '/',
        component: Login
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: '/contact-list',
        component: ContactListComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
