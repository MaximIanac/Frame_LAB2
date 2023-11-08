<template>
    <Head title="Home" />
    
    <div class="text-2xl">Hello "{{ $page.props.user.name }}"</div>
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