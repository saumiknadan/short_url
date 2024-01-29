<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>Register Your Account</h3></div>
                        <div class="card-body">
                            <form action="">

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" v-model="name" id="name" class="form-control mt-2" placeholder="Enter Your EMail" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" v-model="email" id="email" class="form-control mt-2" placeholder="Enter Your EMail" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" v-model="password" id="password" class="form-control mt-2" placeholder="Enter Your Password" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password_confirm">Confirm Password</label>
                                    <input type="password" v-model="confirm_password" id="confirm_password" class="form-control mt-2" placeholder="Confirm Password" required>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" @click.prevent="submitReg">Register</button>
                                </div>
                            </form>
                    
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name:"Register",
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                name:'',
                email:'',
                password:'',
                confirm_password:'',
            }
        },
        methods:{
            submitReg(){
                axios.post('/register',{
                    name:this.name,
                    email:this.email,
                    password:this.password,
                    confirm_password:this.confirm_password,
                }).then((response)=>{
                    console.log(response,'response')
                }).catch((error)=>{
                    console.log('error')
                })
            }
        }
    }
</script>
