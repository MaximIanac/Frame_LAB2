<template>
    <div v-if="links.length > 3" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ ' ' }}
                    <span class="font-medium">{{ (users.current_page - 1) * users.per_page + 1 }}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{ Math.min(users.current_page * users.per_page, users.total) }}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{ users.total }}</span>
                    {{ ' ' }}
                    results
                </p>
            </div>
            <div>
                <nav class="bg-gray-100 rounded-md shadow-sm" aria-label="Pagination">
                    <Link v-for="(link, k) in links" :key="k" :href="link.url || ''"
                        :disabled="link.url === null"
                        :class="{'text-gray-300': link.url === null, 'border-white border-4 font-bold': link.active}"
                        v-html="link.label"
                        aria-current="page"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500" 
                    />
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        links: Array,
        users: Array
    }
}
</script>