import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from "./router.ts";
import {createPinia} from "pinia";
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';

const pinia = createPinia()

createApp(App)
    .use(router)
    .use(pinia)
    .use(ToastPlugin)
    .mount('#app')
