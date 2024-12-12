<script>
import axios from "axios";

export default {

    data() {
        return {
            user: {

                password:null,
                email:null
            }
        }
    },
    methods: {
        async login() {
            try {
                await this.$store.dispatch("user/login",this.user);
                this.$router.push({name:'dashboard'})
            }catch (e){
                const response = e.response;
                if (response){
                    if (response.status===422)
                        console.log("validation error");
                }
            }

        }
    },
}
</script>

<template>
    <div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <router-link to="/signup">Signup</router-link>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Signup</h4>
                        </div>
                        <div class="card-body">
                            <form>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control"  placeholder="Enter your email" v-model="user.email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control"  placeholder="Enter your password" v-model="user.password">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" @click.prevent="login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>

</style>
