<template>
    <Head :title="title" />

    <div class="flex justify-between items-end">
        <div class="px-4 sm:px-0 mt-10">
            <h3 class="text-4xl text-green-700 font-bold ">Add User Page</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
        </div>
        <Link :href="route('users.index')" >
            <div class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-600 duration-200 focus:z-10 focus:ring-2 focus:ring-green-400">
                Back
            </div>
        </Link>
    </div>
    <form @submit.prevent="store">
        <div class="mt-2 border-t-2 border-green-600">
            <dl class="divide-y divide-green-200">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="font-medium leading-6 text-xl text-green-700">Full name</dt>
                    <dd class="flex items-center gap-5 mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input :class="{'border-red-600' : form.errors.name}" 
                            v-model="form.name" type="text" placeholder="Name"
                            class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52"
                        >
                        <div class="text-red-600" v-if="form.errors.name">*{{ form.errors.name }}</div>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="font-medium leading-6 text-xl text-green-700">E-mail</dt>
                    <dd class="flex items-center gap-5 mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input :class="{'border-red-600' : form.errors.email}" 
                            v-model="form.email" type="text" placeholder="E-mail"
                            class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52"
                        >
                        <div class="text-red-600" v-if="form.errors.email">*{{ form.errors.email }}</div>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="font-medium leading-6 text-xl text-green-700">Password</dt>
                    <dd class="flex items-center gap-5 mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input :class="{'border-red-600' : form.errors.password}" 
                            v-model="form.password" type="password" placeholder="Password"
                            class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52"
                        >
                        <div class="text-red-600" v-if="form.errors.password">*{{ form.errors.password }}</div>
                    </dd>
                </div>
            </dl>
            <input type="submit" value="Add User" class="cursor-pointer mt-5 text-2xl font-medium text-gray-500 focus:outline-none bg-white hover:text-green-600 duration-200 ">
        </div>
    </form>
    
</template>

<script>
import Layout from '../../Shared/Layout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

export default {
    props: {
        title: String,
    },
    components: {
        Head, Link
    },
    setup() {
        const form = useForm({
            name: null,
            email: null,
            password: null
        });

        const store = () => {
            form.post(route('users.store'));
        }

        return {form, store};
    },
    layout: Layout,
}
</script>