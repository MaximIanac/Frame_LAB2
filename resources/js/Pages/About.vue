<template>
    <Head :title="title"/>
      
    <div class="text-2xl"> {{ title }}</div>
</template>

<script>
import Layout from '../Shared/Layout.vue';
import { Head } from '@inertiajs/vue3';

    export default {
        props: {
            title: String,
        },
        components: {
            Head
        },
        layout: Layout,
    }
</script>