<template>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ test }}</h1>
            <button class="btn btn-primary" @click="showAlert()">click</button>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            test: "I am home vue"
        }
    },
    methods: {
        showAlert() {
            alert(this.test)
        }
    },
}
</script>

<style scoped>

</style>
