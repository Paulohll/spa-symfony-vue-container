import { createApp } from 'vue'
import { router } from './router'
import { store } from './store'
import Default from '@/layouts/default/Default.vue'
import App from './App.vue'
import axios from 'axios';
import Notifications from '@kyvg/vue3-notification';



const app = createApp(App)
app.component('LayoutDefault', Default)
app.use(store)
app.use(router)
app.use(Notifications)
app.mount('#app')
//set global acces to axios
app.config.globalProperties.axios=axios
app.config.globalProperties.url=process.env.VUE_APP_API_URL
app.config.globalProperties.token=process.env.VUE_APP_ACCEPTED_SECRETS