import Vue from 'vue'
import App from './App.vue'
import router from './routes'
import store from './data/store'
import '@/assets/css/tailwind.css'
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.config.productionTip = false
Vue.use(CKEditor);
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
