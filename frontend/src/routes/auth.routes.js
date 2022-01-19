export default [
    {
        path: '/login',
        name: 'login',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/auth/login'),
        },
        meta: {
            auth: false
        }
    },
    {
        path: '/register',
        name: 'register',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/auth/register'),
        },
        meta: {
            auth: false
        }
    }
]
