import Vue from 'vue';
import VueRouter from 'vue-router'


require('./extra/filter');
require('./extra/progressbar');
require('./extra/customEvents');


import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)



import Home from './components/Home.vue';
import Blog from './components/Blog.vue';
import Post from './components/Post.vue';
import About from './components/About.vue';
import Contact from './components/Contact.vue';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import EditProfile from "./components/auth/EditProfile";
import OauthClients from "./components/auth/OauthClients";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {path: '/', name: 'home', component: Home, meta: { auth: true, title: 'Home' }},
        {path: '/blog', name: 'blog',  component: Blog, meta: { auth: false, title: 'Blog' }},
        {path: '/post', name: 'post',  component: Post, meta: { auth: true, title: 'Post' }},
        {path: '/about', name: 'about',  component: About, meta: { auth: true, title: 'About' }},
        {path: '/contact', name: 'contact',  component: Contact, meta: { auth: true, title: 'Contact' }},
        {path: '/login', name: 'login',  component: Login, meta: { auth: true, title: 'Login' }},
        {path: '/register', name: 'register',  component: Register, meta: { auth: true, title: 'Register' }},
        {path: '/edit-profile', name: 'edit-profile',  component: EditProfile, meta: { auth: true, title: 'Edit Profile' }},
        {path: '/oauth-clients', name: 'oauth-clients', component: OauthClients,  meta: { auth: true, title: 'Oauth Clients' }},

    ],
    mode: 'history',
    computed : {
        User: {
            get() {
                if(this.$store.state.currentUser.user){
                    return true;
                }
                else{
                    return false;
                }

            }
        }
    },
})

