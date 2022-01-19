import Vue from 'vue'
import Vuex from 'vuex'
import profile from './profile.store'
import posts from "./posts.store";
Vue.use(Vuex);
export default new Vuex.Store({
    state: {
        autoSave: true,
        loading: {},
        clear_form: false
    },
    getters: {
        clear_form: state => state.clear_form
    },
    mutations: {
        activateLoading(state, key) {
            Vue.set(state.loading, key, true);
        },
        deactivateLoading(state, key) {
            Vue.set(state.loading, key, false);
        },
        setAutoSave(state, autoSave) {
            state.autoSave = autoSave;
        },
        setClearForm(state, val) {
            state.clear_form = val
        }
    },
    modules: {
        profile,
        posts
    }
})
