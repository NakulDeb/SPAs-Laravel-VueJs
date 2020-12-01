<template>

    <div class="container py-5 shadow-sm">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" @submit.prevent="register()">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        v-model="user.name"
                                        required
                                        autocomplete="name"
                                        autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        v-model="user.email"
                                        required
                                        autocomplete="email"
                                        autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="user.password"
                                        required
                                        autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input
                                        id="confirm_password"
                                        type="password"
                                        class="form-control"
                                        v-model="user.confirm_passwored"
                                        required
                                        autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {

    name: "Register",
    data: () => ({
        user: {
            name: '',
            email: '',
            password: '',
            confirm_passwored: '',
            redirect_location: '/',
        }
    }),
    methods: {
        register() {
            this.$store.dispatch('currentUser/register', this.user)
            // this.$store.dispatch('currentUser/getUser');
        }
    },
}
</script>

