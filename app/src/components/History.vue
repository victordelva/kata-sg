<template>
    <div>
        <p v-for="(trial, key) in history" v-bind:key="key">
            {{key}}. <strong>{{trial.message}}</strong>
        </p>
    </div>
</template>

<script>
    import Trial from "../Domain/Trial";
    import {mapGetters} from 'vuex';
    export default {
        name: "History",
        computed: {
            ...mapGetters('trials', [
                'history',
            ]),
        }
    }
</script>

<style scoped>

</style>