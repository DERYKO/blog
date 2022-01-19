import api from "../api";
import router from "../../routes";
export default {
    namespaced: true,
    state: {
        post: {},
        posts: {data: [], per_page: 20, total: 0, current_page: 1},
        errors: {}
    },
    getters: {
        post: state => state.post,
        posts: state => state.posts,
        errors: state => state.errors
    },
    mutations: {
        setPost(state, post) {
            state.post = post;
        },
        setPosts(state, posts) {
            state.posts = posts
        },
        setErrors(state,errors){
            state.errors = errors;
        }
    },
    actions: {
        async getFeed({commit}, filters) {
            try {
                const {data} = await api.getFeed(filters);
                commit('setPosts', data);
            } catch (e) {
                alert(e);
            }
        },
        async getPost({commit},id){
            try {
                const {data} = await api.getPost(id);
                commit('setPost', data);
            } catch (e) {
                alert(e);
            }
        },
        async createPost({commit}, payload) {
            try {
                await api.createPost(payload);
                await router.push('/my-posts');
            } catch (e) {
                commit('setErrors', e.response.data.errors);
            }
        },
        async getUserPosts({commit}, filters) {
            try {
                const {data} = await api.getUserPosts(filters);
                commit('setPosts', data);
            } catch (e) {
                alert(e);
            }
        }
    }
}
