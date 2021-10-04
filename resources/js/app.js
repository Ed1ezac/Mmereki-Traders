require('./bootstrap');

import { createApp } from 'vue';
import Hello from './components/hello-vue.vue';

const app = createApp({
    components:{
        Hello,
    }
});
app.mount("#app");