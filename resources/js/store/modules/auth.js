import axios from 'axios'


export const auth = {
    state: {
        authStatus: false,
        authToken: null,
        authInfo: {},
        resetInfo: {
            email: null
        },
        phone: {},
        email: {},
    },
    getters: {
        authStatus: function (state) {
            return state.authStatus;
        },
        authToken: function (state) {
            return state.authToken;
        },
        authInfo: function (state) {
            return state.authInfo;
        },
       
        resetInfo: function (state) {
            return state.resetInfo;
        },
        phone: function (state) {
            return state.phone;
        },
        email: function (state) {
            return state.phone;
        },
    },
    actions: {
        profile: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('/profile', payload).then(res => {
                    context.commit('authInfo', res.data.data);
                    resolve(res.data);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        login: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('/login', payload).then((res) => {
                    context.commit('authLogin', res.data);
                    resolve(res.data);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        register: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('/register', payload).then((res) => {
                    context.commit('authLogin', res.data);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        authcheck: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('/authcheck', payload).then((res) => {
                    if (res.data.status === false){
                        context.commit('authLogout');
                    };
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        logout: function (context) {
            return new Promise((resolve, reject) => {
                axios.post('/logout').then((res) => {
                    context.commit('authLogout');
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        forgotPassword: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('/forgot-password', payload).then((res) => {
                    context.commit('email', payload);
                    context.commit('phone', payload);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        forgotPasswordVerifyEmail: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = "auth/forgot-password/verify-email";
                axios.post(url,payload).then((res) => {
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        otpEmail: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = "auth/forgot-password/otp-email";
                axios.post(url,payload).then((res) => {
                    context.commit("email", payload);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        resetPassword: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('auth/forgot-password/reset-password', payload).then((res) => {
                    context.commit("authLogin",res.data);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        updateAuthInfo: function (context, payload) {
            return new Promise((resolve, reject) => {
                if (context.state.authInfo.id === payload.id) {
                    context.commit('authInfo', payload);
                    resolve(payload);
                } else {
                    reject('user data not match');
                }
            });
        },
        verifyEmail: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = "auth/signup/verify-email";
                axios.post(url,payload).then((res) => {
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        signupLoginVerify: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post('auth/signup/login-verify', payload).then((res) => {
                    context.commit('authLogin', res.data);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        loginDataReset: function (context) {
            context.commit('authLogout');
        },
        reset: function (context) {
            context.commit('reset');
        },
    },
    mutations: {
        authLogin: function (state, payload) {
            state.authStatus = true;
            state.authToken = payload.token;
            state.authInfo = payload.user;
        },
        authLogout: function (state) {
            state.authStatus = false;
            state.authToken = null;
            state.authInfo = {};
        },
        forgotPassword: function (state, payload) {
            state.resetInfo = {
                email: payload.email
            }
        },
        resetPassword: function (state) {
            state.resetInfo = {
                email: null
            }
        },
        authInfo: function (state, payload) {
            state.authInfo = payload;
        },
        email: function (state, payload) {
            state.email.otp = payload;
        },
        reset: function(state) {
            state.email = {};
        }
    },
}
