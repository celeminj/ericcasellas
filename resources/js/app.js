import './bootstrap';

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import lenisPlugin from './plugins/lenis'

const app = createApp(App)
app.use(router)
app.use(lenisPlugin)
app.mount('#app')
