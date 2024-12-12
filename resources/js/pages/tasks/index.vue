<script>
import {mapActions, mapGetters} from "vuex";

export default {
    data() {
        return {

        }
    },
    computed: {
        ...mapGetters('tasks',['tasks'])
    },

    methods: {
        ...mapActions('tasks',['destroy','index']),

        async remove(id){
            console.log(id)
            try {
                await this.destroy(id);
                this.index();

            }catch (e) {

            }
        }
    },

    created() {

        this.index();
    }
}
</script>

<template>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <!-- دکمه بازگشت در سمت چپ -->
            <router-link :to="{name:'dashboard'}" class="btn btn-secondary btn-back">بازگشت</router-link>
            <!-- دکمه ایجاد تسک در سمت راست -->
            <router-link class="btn btn-primary btn-create" :to="{name:'tasks-create'}">ایجاد تسک جدید</router-link>
        </div>
        <div class="card-body">




            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان</th>
                    <th>اولویت</th>
                    <th>توضیحات</th>
                    <th>تاریخ ایجاد</th>
                    <th>کاربر ایجادکننده</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="task in tasks">
                    <td>{{task.id}}</td>
                    <td>{{task.title}}</td>
                    <td>{{task.priority}}</td>
                    <td>{{task.description}}</td>
                    <td>{{task.created_at}}</td>
                    <td>{{task.user.name}}</td>
                    <td>
                        <router-link :to="{name:'tasks-edit',params:{id:task.id}}">ویرایش</router-link>
                        <a href="" @click.prevent="remove(task.id)">حذف</a>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>

</style>
