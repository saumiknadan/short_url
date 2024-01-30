<template>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Short Your Url Herenn</div>
                    
                    <div class="card-body">
                        <form action="">
                                <div class="form-group mb-3">
                                    <label for="original_url">Your Link</label>
                                    <input type="url" id="original_url" class="form-control mt-2" placeholder="Enter Your Url" required>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" >Shorten</button>
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
        mounted() {
            console.log('Component mounted.')
        },
        name: "Url Shortner",

        data(){
            return{
                original_url: null,
                error:null,
                shortlink: {}
            };
        },

        methods: {
            shortUrl()
            {
                if(this.original_url){
                        axios.post('/short',{
                            original_url:this.original_url
                        }).then((response)=>{
                            this.shortlink = response.data.data
                            console.log(response.data)
                            this.error = null
                        }).catch((error)=>{
                        console.log(error)
                    })
                }else{
                    this.error = 'This Field is required';
                }
            }
        }
    }
</script>
