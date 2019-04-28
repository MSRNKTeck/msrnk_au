

//require('./bootstrap');

//window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import App from './App.vue';
import Dashboard from './components/Dashboard.vue';
import Home from './components/Home.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import OtpVerify from './components/OtpVerify.vue';
import ResendOtp from './components/ResendOtp.vue';

import Document from './components/user/document.vue';
import DocumentUpload from './components/user/document_upload.vue';

//admin
import Admin from './components/admin/home.vue';
import Make from './components/admin/make/home.vue';
import MakeEdit from './components/admin/make/make_edit';


Vue.use(VueRouter);
Vue.use(VueAxios, axios);
axios.defaults.baseURL = 'http://localhost:8000/api';
const router = new VueRouter({
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    },{
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/otpverify',
        name: 'otpverify',
        component: OtpVerify
    }
    ,{
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        path: '/resendotp',
        name: 'resendotp',
        component: ResendOtp
    }
    ,{
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        },


    },
    {
        path: '/document',
        name: 'document',
        component: Document,
        meta: {
            auth: true
        }
    },
    {
        path: '/document_upload',
        name: 'document_upload',
        component: DocumentUpload,
        meta: {
            auth: true
        }
    },


//admin routes
    {
        path: '/admin', name: 'admin', component: Admin,
        meta: {
            auth: false
        }
    },
    {
        path:'/make', name: 'make', component: Make,
        meta: {
            auth: false
        }
    },
    {
        path: '/make_edit/:id', name: 'make_edit', component: MakeEdit,
        meta: {
            auth: false
        }
    }

    ]
});

Vue.router = router

Vue.use(require('@websanova/vue-auth'), {
   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});
// App.router = Vue.router
// new Vue(App).$mount('#app');
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');