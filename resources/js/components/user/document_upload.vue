<template>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Laravel Vue JS Image Upload</div>

 

                    <div class="card-body">

                        <div v-if="success != ''" class="alert alert-success" role="alert">

                          {{success}}

                        </div>

                        <form @submit="formSubmit" enctype="multipart/form-data">

                        <strong>Document:</strong>

                        <input type="text" class="form-control" v-model="document_type_id">
                        <strong>Number:</strong>

                        <input type="text" class="form-control" v-model="number">

                        <strong>Image:</strong>

                        <input type="file" class="form-control" v-on:change="onImageChange">

 

                        <button class="btn btn-success">Submit</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

 

<script>

    export default {


        data() {

            return {

              number: '',

              document_type_id: '',

              image: '',

              success: ''

            };

        },

        methods: {

            onImageChange(e){

                console.log(e.target.files[0]);

                this.image = e.target.files[0];

            },

            formSubmit(e) {

                e.preventDefault();

                let currentObj = this;

 

                const config = {

                    headers: { 'content-type': 'multipart/form-data' }

                }

 

                let formData = new FormData();

                formData.append('image', this.image);

                formData.append('number', this.number);

                formData.append('document_type_id', this.document_type_id);
 
                let uri = 'http://localhost:8000/api/formSubmit';
                axios.post(uri, formData, config)

                .then(function (response) {

                    currentObj.success = response.data.success;

                })

                .catch(function (error) {

                    currentObj.output = error;

                });

            }

        }

    }

</script>