<template>
    <div id="app">
        <app-content/>
        <router-view/>
    </div>
</template>
<script>
import AppContent from './views/layout/content';

export default {
    components: {AppContent},
    computed: {
        isLoggedIn() {
            return this.$store.getters['profile/loggedIn'];
        },
    }
};
</script>
