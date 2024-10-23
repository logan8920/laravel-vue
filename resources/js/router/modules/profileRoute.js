import MyProfileComponent from "../../components/user/MyProfileComponent.vue";

export default [
    {
        path: '/my-profile',
        name: "user.my.profile",
        component: MyProfileComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
    {
        path: '/settings',
        name: "user.settings",
        component: MyProfileComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
];
