<script>
import {mapActions} from "vuex";

export default {

    methods: {
        ...mapActions('user',['logout']),
        async signout() {

           await this.logout();

           this.$router.push("/");
            this.$toast.top('logout');
        }
    },
}
</script>

<template>

    <div class="container mt-5">
        <a href="" @click.prevent="signout">خروج</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <RouterView></RouterView>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
