<template>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <div class="alert alert-danger" v-if="error && !success">
                        <p>There was an error, unable to complete registration.</p>
                    </div>
                    <div class="alert alert-success" v-if="success">
                        <p>Registration completed. You can now <router-link :to="{name:'otpverify'}">Otp Verify</router-link></p>
                    </div>
                    <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors.name }">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" v-model="name" required>
                            <span class="help-block" v-if="error && errors.name">{{ errors.name }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors.phone }">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control" v-model="phone" required>
                            <span class="help-block" v-if="error && errors.phone">{{ errors.phone }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors.email }">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                            <span class="help-block" v-if="error && errors.email">{{ errors.email }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors.password }">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" v-model="password" required>
                            <span class="help-block" v-if="error && errors.password">{{ errors.password }}</span>
                        </div>
                         <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                            <label for="password_confirmation">Confirmation Password</label>
                            <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
</template>
<script> 
    export default {
        data(){
            return {
                name: '',
                phone: '',
                email: '',
                password: '',
                password_confirmation: '',
                error: false,
                errors: {},
                success: false
            };
        },
        methods: {
            register(){
                var app = this
                this.$auth.register({
                    data: {
                        phone: app.phone,
                        name: app.name,
                        email: app.email,
                        password: app.password,
                        password_confirmation: app.password_confirmation
                    }, 
                    success: function () {
                        app.success = true
                    },
                    error: function (resp) {
                        app.error = true;
                        app.errors = resp.response.data.errors;
                    },
                    redirect: null
                });                
            }
        }
    }
</script>