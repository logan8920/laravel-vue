import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import store from './store';
import DefaultComponent from './components/DefaultComponent.vue';


const app = createApp(DefaultComponent);

//app.component('vue-recaptcha', VueRecaptcha);
//app.component('example-component', ExampleComponent);


app.use(router)
app.use(store);
app.mount('#app');
