<template>
    <div v-if="$page.props.message" @click="$page.props.message = null" class="absolute cursor-pointer left-5 bottom-5 text-white py-1 px-2 rounded-lg bg-indigo-600">
        {{ $page.props.message }}
    </div>

    <div class="w-full bg-green-700">
        <div class="container mx-auto">
            <div class="flex justify-start gap-10 py-4 text-2xl text-white font-bold">
                <div class="inline">
                    <Link :href="route('home')">
                        Home
                    </Link>
                </div>
                <div class="inline">
                    <Link :href="route('about')">
                        About
                    </Link>
                </div>
                <div class="inline">
                    <Link :href="route('users.index')">
                        Users
                    </Link>
                </div>
                <div class="inline ml-auto">
                    <Link :href="route('logout')">
                        Logout
                    </Link>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <slot />
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3"

    export default {
        components: {
            Link
        }
    }
</script>