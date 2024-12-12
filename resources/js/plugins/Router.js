import Vue from 'vue'
import VueRouter from "vue-router";

const routes=[
    {
        path:"/",
        component:()=>import("../pages/Home.vue")
    },
    {
        path:"/admin",
        component:()=>import("../layouts/admin.vue"),
        redirect:{name:'dashboard'},
        meta:{
            requiredAuth:true,
        },
        children:[
            {
                path:"dashboard",
                name:'dashboard',
                component:()=>import("../pages/dashboard.vue")
            }
            ,
            {
                path:"tasks",

                component:()=>import("../pages/tasks/index.vue")
            }
        ]
    },

]

Vue.use(VueRouter)

const router=new VueRouter({
    mode:'history',
    routes
})

router.beforeEach((to,from,next)=>{
    const requiredAuth= to.matched.some((r)=>r.meta.requiredAuth);
    const isAuthenticated=localStorage.getItem('token');

    if (requiredAuth){
        if (!isAuthenticated)
            next({path:'/'})
        else
            next();
    }else {
        next();
    }

})
export default router;
