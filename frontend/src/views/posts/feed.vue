<template>
    <div class="w-full p-2">
        <div class="flex">
            <button @click="sortRecords" class="hover:bg-gray-600 py-0 px-3 rounded">
                <svg v-show="dir === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                </svg>
                <svg v-show="dir === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 w-full">
            <div v-for="(post,index) in posts.data" @click="postDetail(post)" :key="index" class="m-1">
                <div class="flex w-full bg-white shadow-lg rounded-lg">
                    <div class="flex items-start px-4 py-6">
                        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                             src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                             alt="avatar">
                        <div class="">
                            <div class="flex items-center justify-between">
                                <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ post.user.name }}</h2>
                                <small class="text-sm text-gray-700">{{ post.publication_date }}</small>
                            </div>
                            <p class="text-gray-700">Joined on {{ post.user.created_at }} </p>
                            <p class="font-bold">{{ post.title }}</p>
                            <p class="mt-3 text-gray-700 text-sm">
                                {{ post.description.substring(0, 100) }} ....
                            </p>
                            <div class="mt-4 flex items-center">
                                <div class="flex mr-2 text-gray-700 text-sm mr-3">
                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    <span>12</span>
                                </div>
                                <div class="flex mr-2 text-gray-700 text-sm mr-8">
                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                    </svg>
                                    <span>8</span>
                                </div>
                                <div class="flex mr-2 text-gray-700 text-sm mr-4">
                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                    </svg>
                                    <span>share</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 mb-10 mt-2">
            <div class="flex w-full">
                <el-pagination
                    background
                    @size-change="handleSizeChange"
                    @current-change="handleCurrentChange"
                    :current-page.sync="posts.current_page"
                    :page-size="parseInt(posts.per_page)"
                    :page-sizes="[10, 25, 50, 100]"
                    layout="sizes, total, prev, pager, next, jumper"
                    :total="posts.total">
                </el-pagination>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    mounted() {
        this.getFeed({});
    },
    data() {
        return {
            dir: 'desc'
        }
    },
    computed: {
        ...mapGetters({
            posts: 'posts/posts'
        })
    },
    methods: {
        ...mapActions({
            getFeed: 'posts/getFeed'
        }),
        postDetail(post) {
            this.$router.push('/my-posts/details/' + post.id)
        },
        sortRecords() {
            if (this.dir === 'asc') {
                this.dir = 'desc';
            } else {
                this.dir = 'asc';
            }
            this.getFeed({
                dir: this.dir
            })
        },
        handleSizeChange(size) {
            this.getFeed({
                dir: this.dir,
                per_page: size
            })
        },
        handleCurrentChange(page) {
            this.getFeed({
                dir: this.dir,
                page: page
            })
        }
    }
}
</script>
