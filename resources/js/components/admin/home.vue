<template>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Make</div>
				<div class="card-body">
					<router-link :to="{name:'make'}" class="btn btn-primary" >Make</router-link>
					<router-link :to="{name:'model'}" class="btn btn-primary" >Model</router-link>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		data(){
			
		}
	}
</script>