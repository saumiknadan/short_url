<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                        <li class="nav-item">
                            <h1>URL Shortner</h1>

                        </li>
                        <li v-if="user == 'null'" class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>

                        <li v-if="user == 'null'" class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                  
                    <li v-if="user !== 'null'" class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            {{ user.name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="" @click="logout">
                                Logout
                            </a>
                         </div>
                    </li>
            </ul>
        </div>
    </div>
</nav>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'navbar',

        props:['user'],

        mounted() {
            console.log(this.user.name,'user Component mounted.')
        },
        methods: {
            logout(){
                axios.post('/logout', {}).then((response)=>{
                    location.href='/'
                })
            }
        }
    }
</script>
