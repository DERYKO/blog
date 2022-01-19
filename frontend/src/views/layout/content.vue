<template>
    <div class="flex w-screen h-16 justify-between p-1">
        <router-link to="/feed" class="flex">
            <img src="@/assets/logo.jpg" class="py-0">
        </router-link>
        <div v-if="loggedIn" class="flex mr-1">
            <router-link to="/my-posts">
                <button
                    class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold mr-2 py-2 px-3 rounded"
                    type="submit">
                    <div class="flex">
                        <span class="hidden sm:inline-flex"> My Posts</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                </button>
            </router-link>
            <router-link to="/new-post">
                <button
                    class="shadow bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold mr-2 py-2 px-3 rounded"
                    type="submit">
                    <div class="flex">
                        <span class="hidden sm:inline-flex"> New Post</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </button>
            </router-link>
          <div @click="signOut" class="flex">
              <img class="w-10 h-10 rounded-full object-cover mr-4 shadow"
                   src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                   alt="avatar">
          </div>
        </div>
       <div v-if="!loggedIn" class="flex">
              <router-link to="/login">
                  <button
                      class="shadow bg-green-500 focus:shadow-outline focus:outline-none text-white font-bold mr-1 py-2 px-3 rounded"
                      type="submit">
                      <div class="flex">
                         <span class="hidden sm:inline-flex">Log In</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                          </svg>
                      </div>
                  </button>
              </router-link>
           <router-link to="/register">
               <button
                   class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold mr-1 py-2 px-5 rounded"
                   type="submit">
                   <div class="flex">
                      <span class="hidden sm:inline-flex">Sign Up</span>
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                       </svg>
                   </div>
               </button>
           </router-link>
       </div>
    </div>
</template>
<script>
import {mapGetters,mapActions} from 'vuex';
export default {
    mounted() {
        if (this.loggedIn){
            this.getProfile();
        }
    },
    computed: {
        ...mapGetters({
            profile: 'profile/user',
            loggedIn: 'profile/loggedIn'
        })
    },
    methods: {
        ...mapActions({
            getProfile: 'profile/getProfile',
            logout: 'profile/logout'
        }),
        signOut(){
            this.logout();
        }
    }
}
</script>
