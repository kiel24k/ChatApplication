// app.js
import './bootstrap';

import {createApp} from 'vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.min.css'
import App from './App.vue'
import { createPinia } from 'pinia';

const app = createApp(App)
const pinia = createPinia()
app.use(router)
app.use(pinia)
app.mount('#app')
