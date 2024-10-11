import { createRouter,createWebHashHistory } from 'vue-router';
import HomeComponent from '../components/frontend/home/HomeComponent.vue'; // Create this component
import AboutComponent from '../components/frontend/home/AboutComponent.vue';
import SupportComponent from '../components/frontend/home/SupportComponent.vue';
import PricingComponent from '../components/frontend/home/PricingComponent.vue';
import ContactComponent from '../components/frontend/home/ContactComponent.vue';
import LoginComponent from '../components/frontend/auth/LoginComponent.vue';



const routes = [
    {
        path: '/',
        component: HomeComponent,
        name: "frontend.home"
    },
    {
        path: '/about',
        component: AboutComponent,
        name: "frontend.about"
    },
    {
        path: '/support',
        component: SupportComponent,
        name: "frontend.support"
    },
    {
        path: '/pricing',
        component: PricingComponent,
        name: "frontend.pricing"
    },
    {
        path: '/contact',
        component: ContactComponent,
        name: "frontend.contact"
    },
    {
        path: '/login',
        component: LoginComponent,
        name: "frontend.login"
    },

];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
