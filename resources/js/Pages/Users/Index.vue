<template>
    <Head :title="title" />

    <div class="flex justify-between items-end mt-10 mb-5 border-b-green-700 py-2 border-b-2">
        <div class="text-4xl text-green-700 font-bold ">
            Users:
        </div>
        <div>
            <Link :href="route('users.create')">
                <div class="text-sm font-medium text-gray-900 focus:outline-none bg-white hover:text-green-600 duration-200 focus:z-10 focus:ring-2 focus:ring-green-400">
                    Add User
                </div>
            </Link>
        </div>
    </div>

    <ul role="list" class="divide-y divide-gray-100">
        <li v-for="user in users.data" :key="user.id" class="flex justify-between gap-x-6 py-5">
            <div class="flex gap-x-4">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                    src="https://png.pngtree.com/png-clipart/20190619/original/pngtree-male-avatar-vector-icon-png-image_4005098.jpg"
                    alt="" />
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ user.name }}</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ user.email }}</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <div class="flex gap-8">
                    <div>
                        <Link :href="route('users.edit', user.id)">
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-600 duration-200 focus:z-10 focus:ring-2 focus:ring-green-400">Edit</button>
                        </Link>
                    </div>
                    <div>
                        <button v-on:click="destroy(user.id)" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
                    </div>
                    <div class="flex items-center gap-2">
                        <p class="text-xs leading-5 text-gray-500">{{ user.status === 'active' ? 'online' : 'offline' }}</p>
                        <div class="flex items-center h-4 w-4 flex-none rounded-full bg-emerald-500/20 p-1">
                            <div :class="{'bg-red-600' : user.status === 'inactive' }" class="flex items-center m-auto h-1.5 w-1.5 rounded-full bg-emerald-500" />
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <Pagination :links="users.links" :users="users" />
</template>

<script>
import Layout from '../../Shared/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from "../../Shared/Pagination.vue";

export default {
    props: {
        title: String,
        users: Array,
    },
    components: {
        Head,
        Link,
        Pagination,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure?')) {
                this.$inertia.delete(this.route('users.destroy', id))
            }
        }
    },
    layout: Layout,
}
</script>