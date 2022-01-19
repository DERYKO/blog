<template>
    <div class="sm:bg-secondary md:bg-secondary lg:bg-secondary xl:bg-secondary 2xl:bg-secondary grid items-center justify-items-center h-screen w-screen">
        <div class="grid items-start justify-items-center w-full sm:h-2/3 sm:w-2/3 rounded border border-gray-500">
            <h6 class="p-1 mb-4 text-xl md:text-2xl sm:text-2xl lg:text-2xl font-bold">Register Now!!</h6>
            <form @submit.prevent="signUp" class="w-full">
                <div class="flex flex-wrap mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name
                        </label>
                        <input v-model="name" id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="John Doe">
                        <p v-show="errors.name" class="text-red-500 text-xs italic">{{errors.name ? errors.name[0]: ''}}</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone_number">
                           Phone Number
                        </label>
                        <input v-model="phone_number" id="phone_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" placeholder="+275700765433">
                        <p v-show="errors.phone_number" class="text-red-500 text-xs italic">{{errors.phone_number ? errors.phone_number[0]: ''}}</p>
                    </div>
                </div>
                <div class="flex flex-wrap  mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                            Email
                        </label>
                        <input v-model="email" id="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="email" placeholder="johndoe@gmail.com">
                        <p v-show="errors.email" class="text-red-500 text-xs italic">{{errors.email ? errors.email[0]: ''}}</p>

                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                            Password
                        </label>
                        <input v-model="password" id="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="password" placeholder="********">
                        <p v-show="errors.password" class="text-red-500 text-xs italic">{{errors.password ? errors.password[0]: ''}}</p>
                    </div>
                </div>
                <div class="flex flex-wrap px-3">
                    <button
                        class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-20 rounded"
                        type="submit">
                       Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import {mapActions,mapGetters} from 'vuex';
export default {
    data(){
      return {
          name: '',
          email: '',
          phone_number: '',
          password: ''
      }
    },
    computed: {
      ...mapGetters({
          errors: 'profile/errors'
      })
    },
    methods: {
        ...mapActions({
            register: 'profile/register'
        }),
        signUp(){
            this.register({
                name: this.name,
                email: this.email,
                phone_number: this.phone_number,
                password: this.password
            })
        }
    }
}
</script>
