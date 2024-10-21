import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import store from './store';
import toaster from './services/alert';
import DefaultComponent from './components/DefaultComponent.vue';
import {LoadingPlugin} from 'vue-loading-overlay';
import axios from 'axios';
import ENV from './config/env';
// import 'vue-loading-overlay/dist/css/index.css';


const app = createApp(DefaultComponent);
// app.component('authLoadingComponent', authLoadingComponent);

//app.component('vue-recaptcha', VueRecaptcha);
//app.component('example-component', ExampleComponent);
const API_URL = ENV.API_URL;
//console.log(API_URL);
axios.defaults.baseURL = API_URL + '/api';

axios.interceptors.request.use(
    config => {
        //config.headers['x-api-key'] = API_KEY;
        if (localStorage.getItem('vuex')) {
            const vuex = JSON.parse(localStorage.getItem('vuex'));
            const token = vuex.auth.authToken;
            config.headers['Authorization'] = token ? `Bearer ${token}` : '';

            // if (vuex.globalState) {
            //     config.headers['x-localization'] = vuex.globalState.lists.language_code;
            // }
        }
        return config;
    },
    error => Promise.reject(error),
);


app.config.globalProperties.$toaster = toaster;

app.use(router)
app.use(store);
app.use(LoadingPlugin);
app.mount('#app');
