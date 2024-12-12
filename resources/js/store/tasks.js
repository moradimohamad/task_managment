import axios from "axios";

export default {

    namespaced:true,

    state(){
        return{
            tasks:[]
        }
    },

    getters:{
        tasks(state){
            return state.tasks;
        },

        findById(state){
            return function (id){
                return state.tasks.find(task=>task.id===id);
            }
        }
    },


    mutations:{
        SET_TASKS(state,tasks){
            state.tasks=tasks;
        }
    },

    actions:{

        async index({commit},payload){
            const {data}= await axios.get("api/tasks");
            commit("SET_TASKS",data.tasks);
        },

        async create({commit},payload){

             await axios.post("api/tasks/create",payload);
        },
        async update({commit},payload){

            await axios.put(`api/tasks/update/${payload.id}`,payload.task);
        },
        async show({commit},taskId){

            const {data} = await axios.get(`api/tasks/${taskId}`);
            return data.task;
        },
    }
}
