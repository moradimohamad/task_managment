import './bootstrap';
import Vue from "vue"
import APP from "./App.vue"
import Router from "./plugins/Router.js";

new Vue({
    render:(h)=>h(APP),
    router:Router
}).$mount("#app")
