<template>
    <div class="flex flex-col flex-1 p-10 items-center">
        <h5>Title: <span class="font-bold">{{ post.title }}</span></h5>
        <h5 class="mt-5">Author: <span class="font-bold italic">{{ post.user.name }}</span></h5>
        <p class="justify-content sans-serif mt-10">
            {{ post.description }}
        </p>
        <p class="text-red-500 mt-10">Published: {{ post.publication_date }}</p>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    mounted() {
        this.getPost(this.$route.params.id);
    },
    computed: {
        ...mapGetters({
            post: 'posts/post'
        })
    },
    methods: {
        ...mapActions({
            getPost: 'posts/getPost'
        })
    }
}
</script>
