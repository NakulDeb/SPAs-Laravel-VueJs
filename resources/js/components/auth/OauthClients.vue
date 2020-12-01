<template>
    <div class="container py-5">
        <div class="py-3 shadow-sm p-3">
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
</template>

<script>
export default {
    name: "OauthClients"
}
</script>

<style scoped>

</style>
