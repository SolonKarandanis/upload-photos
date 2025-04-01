import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from "./router.ts";
import {createPinia} from "pinia";
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import ToastService from 'primevue/toastservice';

const pinia = createPinia()

createApp(App)
    .use(router)
    .use(pinia)
    .use(ToastPlugin)
    .use(ToastService)
    .use(PrimeVue,{
        theme: {
            preset: Aura
        }
    })
    .mount('#app')
