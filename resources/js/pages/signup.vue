<script>
import axios from "axios";

export default {

    data() {
        return {
            user: {
                name:null,
                password:null,
                password_confirmation:null,
                email:null
            }
        }
    },
    methods: {
        async signup() {
            try {
                await this.$store.dispatch("user/signup",this.user);
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

        <div>
            <div class="container mt-5">

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Signup</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control"  placeholder="Enter your name"  v-model="user.name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control"  placeholder="Enter your email" v-model="user.email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control"  placeholder="Enter your password" v-model="user.password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control"  placeholder="Confirm your password" v-model="user.password_confirmation">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" @click.prevent="signup">Signup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</template>

<style scoped>

</style>
