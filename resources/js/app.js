import './bootstrap';
import Vue from "vue"
import APP from "./App.vue"
import router from "./plugins/Router.js";
import store from "./plugins/vuex.js";

import 'vue2-toast/lib/toast.css';
import Toast from 'vue2-toast';
Vue.use(Toast, {
    type: 'center',
    duration: 3000,
    wordWrap: true,
    width: '150px'
});
new Vue({
    render:(h)=>h(APP),
    router,
    store
}).$mount("#app")
