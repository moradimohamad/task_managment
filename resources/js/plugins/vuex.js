import Vue from "vue";

import Vuex from "vuex"

Vue.use(Vuex)

import user from "../store/user.js"
import tasks from "../store/tasks.js"

const store=new Vuex.Store({
    modules:{
        user,tasks
    }
})


export default store;
