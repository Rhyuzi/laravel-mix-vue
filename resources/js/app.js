import './bootstrap';
import 'vue-toast-notification/dist/theme-sugar.css'; // You can choose a different theme if you prefer

import { createApp } from 'vue';
import AppComponent from './App.vue';
import router from './router/index';
import VueToast from 'vue-toast-notification';

const app = createApp(AppComponent);

// Use VueToast as a plugin
app.use(VueToast);

app.use(router);
app.mount('#app');
