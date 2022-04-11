import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap'
import router from "./router";
import {Axios} from "axios";

createApp(App).use(router).mount('#app')
