import SingleEmailUserComponent from "../../components/user/SingleEmailUserComponent.vue";
import ViewPlanComponent from "../../components/user/ViewPlanComponent.vue";
import MyPlanComponent from "../../components/user/MyPlanComponent.vue";
export default [
    {
        path: '/single-email-validator',
        name: "user.single.email",
        component: SingleEmailUserComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
    {
        path: '/view-plan',
        name: "user.view.plan",
        component: ViewPlanComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
    {
        path: '/my-plan',
        name: "user.my.plan",
        component: MyPlanComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    }
]