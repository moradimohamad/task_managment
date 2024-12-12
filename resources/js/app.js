import './bootstrap';
import Vue from "vue"
import APP from "./App.vue"
import router from "./plugins/Router.js";
import store from "./plugins/vuex.js";
new Vue({
    render:(h)=>h(APP),
    router,
    store
}).$mount("#app")
