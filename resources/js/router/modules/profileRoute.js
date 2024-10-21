import DashboardComponent from "../../components/user/DashboardComponent.vue";


export default [
    {
        path: '/profile',
        name: "user.profile",
        component: DashboardComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
    {
        path: '/settings',
        name: "user.settings",
        component: DashboardComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
];
