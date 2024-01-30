<template>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Short Your Url Here</div>
                    
                        <div class="card-body">
                            <form>
                                    <div class="form-group mb-3">
                                        <label for="original_url">Your Link</label>
                                        <input type="url" id="original_url" name="original_url" v-model="original_url" class="form-control mt-2" placeholder="Enter Your Url" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button @click.prevent="shortUrl" class="btn btn-success" >Shortner</button>
                                    </div>    
                                    <div>
                                        <div v-if="shortlink.short_url">
                                            <p>Your Short URL is:</p>
                                            <a :href="shortlink.original_url">{{ shortlink.short_url }}</a>
                                        </div>
                                    </div>

                                    <div v-if="bad_error.statusText" class="alert alert-danger mt-3">
                                        <p> {{ bad_error.statusText }} Please try again after a minute.</p>
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
                shortlink: {},
                bad_error: {}
            };
        },

        methods: {
            shortUrl()
            {
                if(this.original_url){
                        axios.post('/short',{
                            original_url:this.original_url
                        }).then((res)=>{
                            this.shortlink = res.data.data
                            console.log('na re na re:', res.data.data)
                            this.error = null
                        }).catch((error) => {
                        console.log('Error:', error.response); 
                        // console.log('Error:', error.response.statusText); 
                        this.bad_error = error.response
                        this.error = 'An error occurred. Please try again later.';
                    });
                }else{
                    this.error = 'This Field is required';
                }
            }
        }
    };
</script>
