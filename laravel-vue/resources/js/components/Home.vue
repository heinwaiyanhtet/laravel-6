<template>
<div class="container">
<div class="row">
    <div class="col-12">
        <h1>{{text}}</h1>
        <input type="text" v-model="text" class="form-control">
    </div>
</div>
</div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            text: "I am Home Vue"
        }
    },
}
</script>

<style scoped>

</style>
