<template>
    <Head :title="`Create User`" />
    <div
        class="flex flex-col items-center justify-center max-w-6xl gap-10 mx-auto my-5"
    >
        <h1 class="text-4xl font-semibold">Create User</h1>

        <div class="min-w-[20rem]">
            <form class="w-full" @submit.prevent="submit">
                <!-- Full Name -->
                <div class="flex-col mb-6 md:flex">
                    <label
                        class="block pr-4 mb-1 font-bold text-gray-500 md:text-left md:mb-0"
                        for="inline-full-name"
                    >
                        Full Name
                    </label>
                    <input
                        class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name"
                        type="text"
                        placeholder="Name"
                        :class="{
                            'border-red-600 bg-white animate-pulse focus:animate-none':
                                form.errors.full_name,
                        }"
                        v-model="form.full_name"
                    />

                    <p
                        class="text-xs italic text-red-500"
                        v-if="form.errors.full_name"
                    >
                        {{ form.errors.full_name }}
                    </p>
                </div>
                <!-- Email -->
                <div class="flex-col mb-6 md:flex">
                    <label
                        class="block pr-4 mb-1 font-bold text-gray-500 md:text-left md:mb-0"
                        for="inline-full-email"
                    >
                        Email
                    </label>
                    <input
                        class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        :class="{
                            'border-red-600 bg-white animate-pulse':
                                form.errors.email,
                        }"
                        id="inline-full-email"
                        type="text"
                        placeholder="Email"
                        v-model="form.email"
                    />
                    <p
                        class="mt-1 text-xs italic text-red-500"
                        v-if="errors.email"
                    >
                        {{ form.errors.email }}
                    </p>
                </div>
                <!-- Password -->
                <div class="flex-col mb-6 md:flex">
                    <label
                        class="block pr-4 mb-1 font-bold text-gray-500 md:text-left md:mb-0"
                        for="inline-password"
                    >
                        Password
                    </label>
                    <input
                        class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-password"
                        type="password"
                        placeholder="Password"
                        :class="{
                            'border-red-600 bg-white animate-pulse':
                                form.errors.password,
                        }"
                        v-model="form.password"
                    />
                    <p
                        class="text-xs italic text-red-500"
                        v-if="errors.password"
                    >
                        {{ form.errors.password }}
                    </p>
                </div>
                <div class="md:flex">
                    <div>
                        <button
                            class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none"
                            type="submit"
                            :disabled="form.processing"
                        >
                            Sign Up
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Layout from "./shared/Layout.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    layout: Layout,
    data() {
        return {
            processing: false,
            form: useForm({
                full_name: null,
                email: null,
                password: null,
            }),
        };
    },
    props: {
        errors: Object,
        success_msg: String,
    },
    methods: {
        submit() {
            this.form.post("/user/insert", {
                preserveScroll: true,
                onStart: () => {
                    this.processing = this.processing = true;
                },
                onFinish: () => {
                    this.processing = this.processing = false;
                },
                onSuccess: () => this.form.reset(),
            });
        },
    },
};
</script>
