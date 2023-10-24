import './bootstrap';
import { createApp } from 'vue';
// import ExampleComponent from './components/ExampleComponent.vue';
import AppComponent from './App.vue';
import router from './router/index';


const app = createApp({
    components: {
        AppComponent
    }
});
app.use(router);
app.mount('#app');

