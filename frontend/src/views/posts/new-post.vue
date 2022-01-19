<template>
    <div
        class="sm:bg-secondary md:bg-secondary lg:bg-secondary xl:bg-secondary 2xl:bg-secondary grid items-center justify-items-center h-screen w-screen">
        <div class="grid items-start justify-items-center w-full sm:h-2/3 sm:w-2/3 rounded">
            <form @submit.prevent="newPost" class="w-full p-3">
                <p v-show="errors.title" class="text-red-500 text-xs italic">{{errors.title ? errors.title[0]: ''}}</p>
                <input v-model="post.title" placeholder="Title" class="mb-10 appearance-none border-2 border-gray-200 rounded w-full py-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text">
                <p v-show="errors.description" class="text-red-500 text-xs italic">{{errors.description ? errors.description[0]: ''}}</p>
                <textarea v-model="post.description" class="mb-10 appearance-none border-2 border-gray-200 rounded w-full py-10 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                    Type here ....
                </textarea>
                <button
                    class="shadow bg-gray-500 focus:shadow-outline focus:outline-none mt-10 text-white font-bold py-2  w-full rounded"
                    type="submit">
                    Submit Post
                </button>
            </form>
        </div>
    </div>
</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import {mapActions,mapGetters} from 'vuex';
export default {
    data() {
        return {
            post: {},
            editor: ClassicEditor,
            editorData: '<p>Type your post here</p>',
            editorConfig: {
                // The configuration of the rich-text editor.
            }
        };
    },
    computed: {
        ...mapGetters({
            errors: 'posts/errors'
        })
    },
    methods: {
        ...mapActions({
           createPost: 'posts/createPost'
        }),
        newPost() {
            this.createPost(this.post);
        }
    }
}
</script>
<style>
.ck-editor__editable {
    min-height: 500px;
    width: 100%;
}
</style>
