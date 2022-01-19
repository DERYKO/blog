<template>
    <div class="sm:bg-secondary md:bg-secondary lg:bg-secondary xl:bg-secondary 2xl:bg-secondary grid items-center justify-items-center h-screen w-screen">
        <div class="grid items-center justify-items-center h-2/3 w-2/3 rounded">
            <div class="visible sm:hidden md:hidden lg:hidden flex items-center justify-center h-10 w-3/3">
                <img src="@/assets/logo.jpg" class="w-1/2">
            </div>
            <div class="grid h-full items-center justify-items-center w-full">
                <div
                    class="flex flex-col flex-col-reverse md:flex-row sm:md:flex-row xs:md:flex-row h-full w-full bg-white">
                    <div
                        class="invisible sm:visible md:visible lg:visible xl:visible 2xl:visible w-full md:w-1/3 sm:w-1/3 lg:w-1/3 xl:w-1/3 2xl:w-1/3 bg-white border-10"
                        style="background-color: #252A48">
                        <div class="flex flex-col items-center justify-center h-full">
                            <img src="@/assets/logo.jpg" class="w-1/2">
                        </div>
                    </div>
                    <div class="w-full h-full md:w-2/3 sm:w-2/3 lg:w-2/3 xl:w-2/3 2xl:w-2/3 space-x-2 p-1 border border-gray-500">
                        <div class="flex flex-col items-start justify-center h-full w-full">
                            <div
                                class="flex flex-col items-center justify-center w-full md:w-3/4 sm:w-full lg:w-3/4 xl:w-3/4 2xl:w-3/4 h-full">
                                <p v-show="errors.credentials" class="text-red-500 text-xs italic">{{errors.credentials ? errors.credentials[0]: ''}}</p>
                                <h6 class="p-1 mb-4 text-xl md:text-2xl sm:text-2xl lg:text-2xl font-bold">Login To
                                    Dashboard</h6>
                                <form @submit.prevent="login" class="w-full max-w-sm w-full">
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                                   for="inline-full-name">
                                                Email
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <input v-model="email"
                                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                                   id="inline-full-name" type="email">
                                            <p v-show="errors.email" class="text-red-500 text-xs italic">{{errors.email ? errors.email[0]: ''}}</p>
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                                   for="inline-password">
                                                Password
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <input v-model="password"
                                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                                   id="inline-password" type="password">
                                            <p v-show="errors.password" class="text-red-500 text-xs italic">{{errors.password ? errors.password[0]: ''}}</p>
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3"></div>
                                        <label class="md:w-2/3 block text-gray-500 font-bold">
                                            <input class="mr-2 leading-tight" type="checkbox">
                                            <span class="text-sm">
                                             Remember me.
                                          </span>
                                        </label>
                                    </div>
                                    <div class="md:flex md:items-center">
                                        <div class="md:w-1/3"></div>
                                        <div class="md:w-2/3">
                                            <button
                                                class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                type="submit">
                                                Log In
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions,mapGetters} from 'vuex';

export default {
    data() {
        return {
            email: 'admin@gmail.com',
            password: '@password!',
            remember_me: false
        }
    },
    computed: {
      ...mapGetters({
          errors: 'profile/errors'
      })
    },
    methods: {
        ...mapActions({
            authenticate: 'profile/login'
        }),
        login() {
            this.authenticate({
                email: this.email,
                password: this.password
            })
        }
    }
}
</script>
