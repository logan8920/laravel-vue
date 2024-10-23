import BulkEmailComponent from "../../components/user/BulkEmailComponent.vue";

export default [
    {
        path: '/bulk-email-validator',
        name: "user.bulk.email",
        component: BulkEmailComponent,
        meta: {
            isFrontend: false,
            auth: true,
        }
    },
];