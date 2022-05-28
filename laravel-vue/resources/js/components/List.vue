<template>
<ul>
    <li v-for="(list,index) in lists" :key="index">{{list}}</li>
</ul>
</template>

<script>
export default {
    name: "List",
    data() {
        return {
            lists: ['apple','orange','banana','mango']
        }
    },
}
</script>

<style scoped>

</style>
