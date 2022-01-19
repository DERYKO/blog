import api from '../api';
export default {
    namespaced: true,
    state: {
        user: {},
        errors: {}
    },
    getters: {
        loggedIn() {
            return !!window.localStorage.getItem('blog@2022!');
        },
        user: state => state.user,
        errors: state => state.errors
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setErrors(state, errors) {
            state.errors = errors;
        }
    },
    actions: {
        async login({commit}, credentials) {
            try {
                commit('setErrors', {});
                const response = await api.login(credentials);
                await localStorage.setItem('blog@2022!', response.token);
                commit('setUser', response.user);
                window.location.href = '/feed'
            } catch (e) {
                commit('setErrors', e.response.data.errors);
            }
        },
        async register({commit}, payload) {
            try {
                commit('setErrors', {});
                await api.register(payload);
                window.location.href = '/login'
            } catch (e) {
                commit('setErrors', e.response.data.errors);
            }
        },
        async getProfile({commit}, filters = {}) {
            try {
                const response = await api.getProfile(filters);
                commit('setUser', response);
            } catch (e) {
                alert(e);
            }
        },
        async logout(context, filters = {}) {
            await api.logout(filters);
            localStorage.removeItem('blog@2022!');
            window.location.href = '/feed';
        }
    }
};
