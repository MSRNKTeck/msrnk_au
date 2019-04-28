<template>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Make Edit</div>
				<div class="card-body">
					<form @submit.prevent="editMake">
						<div class="form-group">
			          		<label>Make</label>
			          		<input type="text" id="name" v-model="make.name" class="form-control" required>
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
				make: {}
			}
			
		},
		created(){
			let uri = `http://localhost:8000/api/make_edit/${this.$route.params.id}`;
			this.axios.get(uri).then(response =>{
				this.make = response.data;
			});
			
		},
		methods: {
			editMake(){
				let uri = `http://localhost:8000/api/make_update/${this.$route.params.id}`;
					this.axios.get(uri,this.make).then((response) =>{
					this.$router.push({name:'make'});
				});
			}
		}
	}
</script>