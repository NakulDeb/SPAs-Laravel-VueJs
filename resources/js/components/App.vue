<template>
    <div>
        <Navbar></Navbar>
        <div class="container py-3 ">
            <div class="py-3 shadow-sm bg-white">
                <h4  id="welcome-text" class="text-center text-secondary">Welcome To The Single Page Application</h4>
            </div>
        </div>

        <router-view></router-view>

        <Footer></Footer>
        <vue-progress-bar></vue-progress-bar>

    </div>
</template>

<script>

    import Navbar from './pages/nav-bar';
    import Footer from './pages/page-footer';

    export default {
        name: "App",
        components: {
            Navbar,
            Footer,
        },

        mounted() { },
        computed : {
            User: {
                get() {
                    return this.$store.state.currentUser.user;
                }
            },
        },
        methods: { },
        created() {
            axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem('access_token');
            this.$store.dispatch('currentUser/getUser');
        },
        watch: {
            '$route'(to, from) {
                document.title = to.meta.title || 'Laravel'
            }
        },
    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Goldman&family=Lobster&display=swap');
    #welcome-text {
        font-family: 'Goldman', cursive;
        font-family: 'Lobster', cursive;
    }

</style>
