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
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
