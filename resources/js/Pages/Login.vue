<template>
    <Head :title="title" />

    <div class="h-screen w-full">
        <div class="w-1/3 h-full m-auto flex items-center">
            <form @submit.prevent="login">
                <dl class="divide-y divide-green-200">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-xl text-green-700">E-mail</dt>
                        <dd class="flex items-center gap-5 mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <input :class="{ 'border-red-600': form.errors.email }" v-model="form.email" type="text"
                                placeholder="E-mail"
                                class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52">
                            <div class="text-red-600" v-if="form.errors.email">*{{ form.errors.email }}</div>
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-xl text-green-700">Password</dt>
                        <dd class="flex items-center gap-5 mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <input :class="{ 'border-red-600': form.errors.password }" v-model="form.password"
                                type="password" placeholder="Password"
                                class="outline-green-500 border-2 border-green-700 rounded-md px-2 py-1 w-52">
                            <div class="text-red-600" v-if="form.errors.password">*{{ form.errors.password }}</div>
                        </dd>
                    </div>
                </dl>
                <div class="text-center">
                    <input type="submit" value="Login"
                    class="py-2.5 px-5 mr-2 mb-2 rounded-lg border border-gray-200 hover:bg-gray-100 cursor-pointer mt-5 text-2xl font-medium text-green-800 focus:outline-none bg-white hover:text-green-600 duration-200 ">
           
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import LoginLayout from '../Shared/LoginLayout.vue';
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
            email: null,
            password: null
        });

        const login = () => {
            form.post(route('login'));
        }

        return { form, login };
    },
    layout: LoginLayout,
}
</script>