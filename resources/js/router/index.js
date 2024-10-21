import { createRouter,createWebHashHistory } from 'vue-router';
import HomeComponent from '../components/frontend/home/HomeComponent.vue'; // Create this component
import AboutComponent from '../components/frontend/home/AboutComponent.vue';
import SupportComponent from '../components/frontend/home/SupportComponent.vue';
import PricingComponent from '../components/frontend/home/PricingComponent.vue';
import ContactComponent from '../components/frontend/home/ContactComponent.vue';
import LoginComponent from '../components/frontend/auth/LoginComponent.vue';
import RegisterComponent from '../components/frontend/auth/RegisterComponent.vue';
import authLoadingComponent from '../components/frontend/auth/loadingComponent.vue';
import DashboardComponent from '../components/user/DashboardComponent.vue';
import profileRoute from './modules/profileRoute';
//import ExceptionComponent from '../components/exception/ExceptionComponent.vue';
import store from "../store";





const baseRoutes = [
    {
        path: '/',
        component: HomeComponent,
        name: "frontend.home",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/about',
        component: AboutComponent,
        name: "frontend.about",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/support',
        component: SupportComponent,
        name: "frontend.support",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/pricing',
        component: PricingComponent,
        name: "frontend.pricing",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/contact',
        component: ContactComponent,
        name: "frontend.contact",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/login',
        component: LoginComponent,
        name: "frontend.login",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/register',
        component: RegisterComponent,
        name: "frontend.signup",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/loading',
        component: authLoadingComponent,
        name: "frontend.auth.loading",
        meta: {
            isFrontend: true,
            auth: false,
        },
    },
    {
        path: '/dashboard',
        component: DashboardComponent,
        name: "user.dashboard",
        meta: {
            isFrontend: false,
            auth: true,
        },
        
    },
];

const routes = baseRoutes.concat(
    profileRoute,
);

//console.log(routes);

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    
    if (to.meta.auth === true) {
        
        if (!store.getters.authStatus) {
            console.log("nexthrere",to.meta.auth);
            next({name: "frontend.login"});
        } else {
            
            if (to.meta.isFrontend === false) {
                if (to.meta.access === false) {
                    // next({
                    //     name: "route.exception",
                    // });
                } else {
                    next();
                }
            } else {
                
                next();
            }
        }
    } else if ((to.name === "frontend.login" || to.name === "frontend.signup" || to.name === "frontend.forgotPassword" || to.name === "frontend.auth.loading") && store.getters.authStatus) {
        console.log("hrere");
        next({name: "frontend.home"});
    } else {
        next();
    }
});

export default router;
