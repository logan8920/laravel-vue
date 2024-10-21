import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";
import {auth} from "./modules/auth";
import {home} from './modules/home';

export default new createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        auth,
        home,
    },
    plugins: [
        createPersistedState({
            paths: ["auth"],
        }),
    ],
});