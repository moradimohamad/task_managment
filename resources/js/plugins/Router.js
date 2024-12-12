import Vue from 'vue'
import VueRouter from "vue-router";

const routes=[
    {
        path:"/",
        component:()=>import("../pages/Home.vue")
    },
    {
        path:"/tasks",
        component:()=>import("../pages/tasks.vue")
    }
]

Vue.use(VueRouter)

const Router=new VueRouter({
    mode:'history',
    routes
})


export default Router;
