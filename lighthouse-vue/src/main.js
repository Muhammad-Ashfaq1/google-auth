import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import VueSocialauth from 'vue-social-auth'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.config.globalProperties.$env = {
    apiUrl: import.meta.env.VITE_BASE_URL,
};

app.use(createPinia())
app.use(router)

app.mount('#app')
