<template>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Resend OTP </div>
				<div class="card-body">
					<div class="alert alert-danger" v-if="error && !success">
                        <p>There was an error, your phone number is invalid or not register</p>
                    </div>
					<div class="alert alert-success" v-if="success">
                        <p>Your Otp is Successfully Resend. You can now <router-link :to="{name:'otpverify'}">Verify Otp</router-link></p>
                    </div>
					<form autocomplete="off" @submit.prevent="ResendOtp" v-if="!success">
						<div class="form-group" v-bind:class="{ 'has-error': has_error && errors.phone }">
							<label>Phone</label>
							<input type="text" id="phone" v-model="post.phone" class="form-control" required>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							
						</div>
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
				post:{},
				error: false,
                errors: {},
                success: false
			}
		},
		methods: {
			ResendOtp(){
				let uri = 'http://localhost:8000/api/resendotp';
				this.axios.post(uri, this.post).then((response) =>{
					//this.$router.push({ name: 'login'});
					 this.success = true;
					
				}).catch(error => {
		          this.loaded = true;
		          this.error = true;
                  this.errors = resp.response.data.errors;
		          
		        });
				
			}
		}
	}
</script>