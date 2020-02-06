<template>
    <button @click="$emit('click')">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "Btn",
        props: {
            text: String,
        }
    }
</script>

<style scoped>

</style>