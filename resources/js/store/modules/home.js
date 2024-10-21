import axios from 'axios'


export const home = {
    state: {},
    getters: {},
    actions: {
        singleEmailVerify: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('/verify-single-email', payload).then((res) => {
                    //context.commit('authLogin', res.data);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
    },
    mutations: {},
}
