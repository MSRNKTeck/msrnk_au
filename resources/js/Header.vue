<template>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-blue">
		  <a class="navbar-brand" href="#"><b>MSRNK</b></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <router-link :to="{ name: 'home' }" class="nav-link" >Home <span class="sr-only">(current)</span></router-link>
		      </li>
		       <li class="nav-item">
		      	<router-link :to="{ name: 'admin'}" class="nav-link">Admin</router-link>		      
		      </li>
		     <!-- <li class="nav-item">
		      	<router-link to="/contact" class="nav-link">Contact Us</router-link>
		      </li>
		      <li class="nav-item">
		      	<router-link to="/customer/home" class="nav-link">Customer</router-link>
		       
		      </li>
		      <li class="nav-item">
		      	<router-link to="/posts" class="nav-link">Posts</router-link>
		       
		      </li> -->
		    </ul>
		    <ul class="navbar-nav ">
                <!-- <li class="nav-item">
                    <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                </li> -->
                <li v-if="!$auth.check()" class="nav-item">
                    <router-link :to="{ name: 'register' }" class="nav-link">Register</router-link>
                </li>
                <li v-if="!$auth.check()" class="nav-item">
                    <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
                </li>
                
                <li v-if="$auth.check()" class="nav-item">
                	
                    <a href="#" @click.prevent="$auth.logout()" class="nav-link">Logout</a>
                </li>
            </ul>
		    
		  </div>
		</nav>
		
	</div>
</template>
<script>
	
</script>