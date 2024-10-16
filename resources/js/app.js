import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import store from './store';
import toaster from './services/alert';
import DefaultComponent from './components/DefaultComponent.vue';


const app = createApp(DefaultComponent);
// app.component('authLoadingComponent', authLoadingComponent);

//app.component('vue-recaptcha', VueRecaptcha);
//app.component('example-component', ExampleComponent);

app.config.globalProperties.$toaster = toaster;

app.use(router)
app.use(store);
app.mount('#app');
