<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>Login Your Account</h3></div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" v-model="email" class="form-control mt-2" placeholder="Enter Your EMail" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" v-model="password" class="form-control mt-2" placeholder="Enter Your Password" required>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" @click.prevent="userlogin">Login</button>
                                </div>                                
                            </form>
                            <div v-if="error" class="alert alert-danger mt-3">
                            {{ error }}
                        </div>vvv
                            
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'Login',
        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return{
                email:'',
                password:'',
                error: null,
            }
        },

        methods: {
            userlogin(){
                axios.post('/login',{
                    email: this.email,
                    password: this.password
                }).then((respons)=>{
                    console.log(respons,'respons')
                    location.href = '/home'
                }).catch((error)=>{
                    console.log('error')
                    if (error.response && error.response.status === 401) {
                    this.error = 'An error occurred. Please try again later.';
                } else {
                    this.error = 'These credentials do not match our records.';
                }
                });
            }
        }
    }
</script>
