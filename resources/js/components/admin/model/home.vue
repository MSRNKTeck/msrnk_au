<template>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Model</div>
				<div class="card-body">
					<div v-if="success != ''" class="alert alert-success" role="alert">
                        {{success}}
                    </div>
					<!-- Button to Open the Modal -->
					  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					   Create new Model
					  </button>
					  <router-link :to="{name:'admin'}" class="btn btn-danger float-right">Back</router-link>
					  <br><br>

					  <!-- The Modal -->
					  <div class="modal fade" id="myModal">
					    <div class="modal-dialog">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title">Create new Model</h4>
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body">
					          <form @submit.prevent="addModel">
					          	<div class="form-group">
					          		<label>Make</label>
					          		<input type="text" id="name" v-model="car.name" class="form-control" required>
					          	</div>
					          	<div class="form-group">
					          		<label>Model</label>
					          		<input type="text" id="name" v-model="car.name" class="form-control" required>
					          	</div>
					          	<div class="form-group">
					          		<button type="submit" class="btn btn-primary">Submit</button>
					          	</div>
					          </form>
					        </div>
					        
					        <!-- Modal footer -->
					        <div class="modal-footer">
					          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					        </div>
					        
					      </div>
					    </div>
					  </div>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Brand Name</th>
								<th>Model</th>
								<th>Auction</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="make in makes" :key="make.id">
								<td>{{ make.id }}</td>
								<td>{{ make.name }}</td>
								<td>
									<router-link :to="{name: 'make_edit', params: { id: make.id }}" class="btn btn-warning">Edit</router-link>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		data(){
			return {
				models: {},
				car: {},
				success: ''
			}
		},
		created(){
			let uri = 'http://localhost:8000/api/model';
			this.axios.get(uri).then(response =>{
				this.makes = response.data.data;
			});
		},
		methods:{
			addModel(){
				let uri = 'http://localhost:8000/api/model_store';
				this.axios.post(uri, this.car).then((response) =>{
					//this.$router.push({name: 'make'});
					this.success = response.data.success;
				});
			}
		}
	}
</script>