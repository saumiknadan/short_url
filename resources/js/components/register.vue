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
                                    <input type="text" id="name" class="form-control mt-2" placeholder="Enter Your EMail" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control mt-2" placeholder="Enter Your EMail" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control mt-2" placeholder="Enter Your Password" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password-confirm">Password</label>
                                    <input type="password-confirm" id="password" class="form-control mt-2" placeholder="Enter Your Password" required>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success">Register</button>
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
