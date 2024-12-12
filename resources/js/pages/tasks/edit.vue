<script>


import {mapActions, mapGetters} from "vuex";

export default {
    methods: {

        ...mapActions('tasks',['show','update']),
        async edit(){
            try {
                await this.update({id:this.$route.params.id,task:this.task});
                this.$toast.top('updated');
            }catch (e) {
                const response=e.response;
                if (response){
                    if (response.status===422){
                        this.$toast.top('validation error');
                    }
                }
            }

        }
    },

    data() {
        return {
            task: {
                title:null,
                priority:null,
                description:null
            },
            priorities:[
                {
                    label:'کم',
                    value:1
                },
                {
                    label:'متوسط',
                    value:2
                },
                {
                    label:'بالا',
                    value:3
                }
            ]
        }
    },
    computed: {
        ...mapGetters("tasks",['findById'])
    },

    async created() {

        const task =this.findById(this.$route.params.id)
        if (task){
            this.task=task;
        }else {
            this.task=await this.show(this.$route.params.id);
        }
        // const task =tasks.findById(this.$route.params.id)
        // console.log(task)

    }


}
</script>

<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">

            <router-link :to="{name:'tasks'}" class="btn btn-secondary btn-back">بازگشت</router-link>


        </div>
        <div class="card-body">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="title">عنوان تسک</label>
                    <input type="text" class="form-control" v-model="task.title">
                </div>

                <div class="form-group">
                    <label for="priority">اولویت</label>
                    <select class="form-control"  v-model="task.priority">
                        <option :value="priority.value" v-for="priority in priorities">{{ priority.label }}</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" id="description" v-model="task.description"></textarea>
                </div>

                <!-- دکمه ایجاد تسک در فرم -->
                <button type="button" @click.prevent="edit" class="btn btn-primary btn-submit">ویرایش تسک</button>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
