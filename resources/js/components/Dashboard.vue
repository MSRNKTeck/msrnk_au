<template>
    <div class="row">
    	<div class="col-md-6">
            <div class="card" style="width: 18rem;">
              <!-- <img class="card-img-top" src="public/svg/my_company_logo.PNG" alt="Card "> -->
              <div class="card-body">
                <h5 class="card-title">User Profile</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $auth.user().name }}</li>
                <li class="list-group-item">{{ $auth.user().phone }}</li>
                <li class="list-group-item">{{ $auth.user().email }}</li>
              </ul>
              <div class="card-body">
                <router-link :to="{name:'document_upload'}" class="btn btn-primary" >Card</router-link>
                <router-link :to="{name:'document'}" class="btn btn-primary float-right" >Upload</router-link>
              </div>
            </div>
            
    		
    		
        
    	</div>
    	<div class="col-md-6">
    		<div class=card>
    			<div class="card-header">User Docunents </div>
    			<div class="card-body" v-for="user in users">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Document: {{ user.document_type.name}}</li>
                        <li class="list-group-item">Number:{{ user.number}}</li>
                        <li class="list-group-item">Status</li>
                        <li class="list-group-item" v-if="user.document_status == 1">
                            <button  class="btn btn-warning">Pending</button> 
                        </li>
                        <li class="list-group-item" v-else-if="user.document_status == 2">
                            <button class="btn btn-success">Approved</button> 
                        </li>
                        <li class="list-group-item" v-else="user.document_status == 3">
                            <button class="btn btn-danger">Rejected</button> 
                        </li>
                    </ul>
    			</div>
    			
    		</div>
    	</div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                users:{}
            }
        },
        created(){
            let uri = 'http://localhost:8000/api/user_profile';
            this.axios.get(uri).then(response =>{
                this.users = response.data.data;
            });
        }

    }
</script>