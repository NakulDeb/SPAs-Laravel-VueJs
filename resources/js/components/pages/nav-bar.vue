<template>
    <nav id="nav" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <router-link class="nav-link" :class="{'active': $route.name == 'home' }" :to="`/`">Home</router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div  class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :class="{'active': $route.name == 'post' }" :to="`/post`">Post</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :class="{'active': $route.name == 'blog' }" :to="`/blog`">Blog</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :class="{'active': $route.name == 'about' }" :to="`/about`">About Us</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :class="{'active': $route.name == 'contact' }" :to="`/contact`">Contact Us</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :class="{'active': $route.name == 'oauth-clients' }" :to="`/oauth-clients`">Oauth Clients</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/post/search?searchKey=a">Web-search</a>
                    </li>
                </ul>


                <ul v-if="!User" class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="`/login`">Login</router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" :to="`/register`">Register</router-link>
                    </li>
                </ul>
                <ul v-else class="navbar-nav ml-auto">
                    <li  class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{User.name}}
                            <img id="nav-img" v-if="User.photo" v-bind:src="User.photo" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <router-link class="dropdown-item " :to="`/edit-profile`" >Edit Profile</router-link>
                            <button class="dropdown-item " v-on:click="logout()" >Logout</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "nav-bar",

    mounted() {},
    methods: {
        logout() {
            localStorage.clear();
            this.$store.dispatch('currentUser/resetUser');
            this.$router.push('/login');
        },
    },
    computed : {
        User: {
            get() {
                console.log("called");
                return this.$store.state.currentUser.user;

            }
        }
    },
}
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Goldman&display=swap');
    #nav {
        font-family: 'Goldman', cursive;
    }
    #nav-img{
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }
</style>
