<template>
  <div class="row justify-content-center">
  	<div class="col-md-6">
  		<div class="card">
  			<div class="card-header">Upload</div>
  			<div class="card-body">
  				<form @submit.prevent="Document" >
  					<div class="form-group">
  						<label>Document Select</label>
  						<select class="form-control" v-model="user.document_type_id">
  							<option v-for="post in posts" :key="post.id" :value="post.id">{{post.name}}</option>
  						</select>
  					</div>
  					<div class="form-group">
  						<label>Number</label>
  						<input type="text" id="number" v-model="user.number" class="form-control" required>
  					</div>
  					<div class="form-group">
  						<label>File</label>
  						<input type="text" id="file" v-model="user.file" class="form-control" required>
              
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
      data() {
        return {
          posts: {},
          user:{}

        }
      },
      created() {
      let uri = 'http://localhost:8000/api/document_type';
      this.axios.get(uri).then(response => {
        this.posts = response.data.data;
      });
    },
    methods:{
    	Document(){
    		let uri = 'http://localhost:8000/api/document_store';
        this.axios.post(uri, this.user).then((response) => {
           this.$router.push({name: 'dashboard'});
        });
    	}
    }
  }
</script>