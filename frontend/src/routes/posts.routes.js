export default [
    {
        path: '/feed',
        name: 'feed',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/posts/feed'),
        },
        meta: {
            auth: false
        }
    },
    {
        path: '/new-post',
        name: 'new-post',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/posts/new-post'),
        },
        meta: {
            auth: true
        }
    },
    {
        path: '/my-posts',
        name: 'my-posts',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/posts/user-posts'),
        },
        meta: {
            auth: true
        }
    },
    {
        path: '/my-posts/details/:id',
        name: 'my-post-details',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/posts/user-post-detail'),
        },
        meta: {
            auth: false
        }
    }
]
