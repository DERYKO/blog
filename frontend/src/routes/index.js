import Vue from 'vue'
import Router from 'vue-router'
import auth from './auth.routes';
import posts from "./posts.routes";
import authMiddleware from './middlewares/auth-middleware';
Vue.use(Router);
const router = new Router({
    mode: 'history',
    routes: [
        ...auth,
        ...posts,
        {
            path: '*',
            redirect: '/feed',
        },
    ],
});

router.beforeEach((to, from, next) => {
    let result = null;
    if (to.meta.auth) {
        result = authMiddleware(to, next);
    } else {
        result = next();
    }
    return result;
});


export default router;
