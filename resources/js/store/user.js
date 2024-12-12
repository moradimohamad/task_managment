export default {
    namespaced:true,
    state(){
        return{
            user:[],

        }
    },

    getters:{
        user(state){
            return state.user
        }
    },
    mutations:{
        SET_USER(state,payload){
            state.user=payload
        }
    },

    actions:{

        async signup({commit},payload){

            const {data}= await axios.post("/api/register",payload);
            commit("SET_USER",data.user);
            localStorage.setItem('token',data.token);
            window.axios.defaults.headers.common['Authorization']=`Bearer ${data.token}`
        },

        async login({commit},payload){

            const {data}= await axios.post("/api/login",payload);
            localStorage.setItem('token',data.token);
            window.axios.defaults.headers.common['Authorization']=`Bearer ${data.token}`
        },
        async logout({commit},payload){

            const {data}= await axios.post("/api/logout",payload);
            localStorage.clear();
            window.axios.defaults.headers.common['Authorization']="";
        }
    }
}
