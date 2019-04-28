<template>
    <div>
        <Header />
        <div class="container">
            <router-view></router-view>
            
        </div>
       
    </div>

</template>

<script>
    import Header from './Header.vue'
    import Footer from './Footer.vue'

    export default{
        components:{ Header, Footer}
    }

</script>