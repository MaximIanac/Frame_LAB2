<template>
    <Head :title="title" />

    <div class="flex justify-between items-end">
        <div class="px-4 sm:px-0 mt-10">
            <h3 class="text-4xl text-green-700 font-bold ">Edit User Page</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
        </div>
        <Link :href="route('users.index')" >
            <div class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-600 duration-200 focus:z-10 focus:ring-2 focus:ring-green-400">
                Back
            </div>
        </Link>
    </div>
    
    <form @submit.prevent="update">
        <div class="mt-2 border-t-2 border-green-600">
            <dl class="divide-y divide-green-200">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="font-medium leading-6 text-xl text-green-700">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input v-model="form.name" type="text" placeholder="Name"
                            class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52"
                        >
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-xl font-medium leading-6 text-green-700">Email address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <input v-model="form.email" type="text" placeholder="Email"
                            class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52"
                        >
                    </dd>
                </div>
            </dl>
        </div>

        <div class="flex justify-start items-center gap-5">
            <input :disabled="form.processing" type="submit" value="Edit User" class="py-2.5 px-5 mr-2 mb-2 rounded-lg border border-gray-200 hover:bg-gray-100 text-2xl cursor-pointer font-medium text-green-600 focus:outline-none bg-white hover:text-green-800 duration-200 ">
            <div v-if="form.isDirty" class="text-blue-600 font-medium text-lg">
                Do not forget save the changes
            </div>
        </div>
        
    </form>
    
</template>

<script>
import Layout from '../../Shared/Layout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

export default {
    props: {
        title: String,
        user: Object
    },
    components: {
        Head, Link
    },
    setup(props) {
        const form = useForm({
            name: props.user.name,
            email: props.user.email,
        });

        const update = () => {
            form.put(route('users.update', props.user.id));
        }

        return {form, update};
    },
    layout: Layout,
}

</script>