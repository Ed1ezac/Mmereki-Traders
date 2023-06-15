/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { createApp } from 'vue';
import Navbar from './components/navbar.vue';
import ErrorBanner from './components/error-banner.vue';
import StatusBanner from './components/status-banner.vue';
import UploadField from './components/file-upload-field.vue';
import TradeSelector from './components/trade-selector.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 const app = createApp({
     components:{
        Navbar,
        UploadField,
        ErrorBanner,
        StatusBanner,
        TradeSelector,
     }
 });
 app.mount("#app");
