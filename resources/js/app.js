import './bootstrap';

import Alpine from 'alpinejs';
import 'viewerjs/dist/viewer.css'
import VueViewer from 'v-viewer'
import {createApp} from "vue";
import router from "./router";
import CompainsIndex from "./components/compains/CompainsIndex";

createApp({
    components:{
        CompainsIndex,
    }
}).use(router).use(VueViewer).mount("#app");
// window.Alpine = Alpine;

// Alpine.start();
