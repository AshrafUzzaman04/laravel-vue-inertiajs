<template>
    <!-- <Head :title="Login" /> -->
    <div
        class="flex flex-col items-center justify-center max-w-6xl min-h-screen mx-auto"
    >
        <div class="p-5 border rounded-lg shadow-md">
            <h1 class="mb-2 text-4xl font-semibold text-center">Login</h1>

            <div class="min-w-[20rem]">
                <form class="w-full" @submit.prevent="submit">
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
                                Sign In
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/vue3";
export default {
    layout: null,
    data() {
        return {
            processing: false,
            form: useForm({
                email: "",
                password: "",
            }),
        };
    },
    props: {
        errors: Object,
    },
    methods: {
        submit() {
            this.form.post(
                "/authenticate",
                {
                    email: this.form.email,
                    password: this.form.password,
                },
                {
                    onStart: () => (this.processing = true),
                    onSuccess: () => (this.processing = false),
                }
            );
        },
    },
};
</script>
