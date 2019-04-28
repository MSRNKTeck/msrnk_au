<template>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, unable to sign in with those credentials or Otp is not verified.</p>
                    </div>
                    <form @submit.prevent="login" method="post">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" v-model="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <router-link :to="{ name: 'resendotp' }" v-if="error" class="btn btn-success">Resend Otp</router-link>
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
        email: null,
        password: null,
        error: false
      }
    },
    methods: {
      login(){
        var app = this
        this.$auth.login({
            params: {
              email: app.email,
              password: app.password
            }, 
            success: function () {},
            error: function () {
                app.error = true;
                app.errors = resp.response.data.errors;
            },
            rememberMe: true,
            redirect: '/dashboard',
            fetchUser: true,
        });       
      },
    }
  } 
</script>