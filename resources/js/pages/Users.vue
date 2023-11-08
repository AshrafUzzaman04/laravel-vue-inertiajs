<template>
    <Head title="Users" />
    <div class="max-w-6xl mx-auto my-5">
        <div class="flex flex-col">
            <div class="space-y-5">
                <h1 class="text-4xl font-semibold">All User</h1>
            </div>
            <div class="flex justify-between mt-5">
                <input
                    v-model="search"
                    type="text"
                    placeholder="Search..."
                    class="px-2 py-1 border-[2px] rounded-md outline-none focus:border-violet-500"
                />
                <Link
                    href="user/create"
                    class="left-0 px-3 py-2 font-semibold text-white bg-purple-500 rounded-lg"
                    >Create User</Link
                >
            </div>
        </div>
        <!-- table content -->
        <div class="w-full sm:px-6">
            <div class="px-4 bg-white md:px-8 xl:px-10">
                <div class="overflow-x-auto mt-7">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr
                                class="h-16 border-blue-200 bg-blue-50 focus:outline-none"
                            >
                                <!-- <th>
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="mr-2 text-base font-medium leading-none text-gray-700"
                                        >
                                            Sn
                                        </p>
                                    </div>
                                </th> -->
                                <th class="focus:text-indigo-600">
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="mr-2 text-base font-medium leading-none text-gray-700"
                                        >
                                            Name
                                        </p>
                                    </div>
                                </th>
                                <th class="focus:text-indigo-600">
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="mr-2 text-base font-medium leading-none text-gray-700"
                                        >
                                            Email Address
                                        </p>
                                    </div>
                                </th>
                                <th class="focus:text-indigo-600">
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="mr-2 text-base font-medium leading-none text-gray-700"
                                        >
                                            Action
                                        </p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="h-16 border border-gray-100 rounded focus:outline-none"
                                v-for="user in users.data"
                                :key="user.id"
                            >
                                <!-- <td class="focus:text-indigo-600">
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="mr-2 text-base font-medium leading-none text-gray-700"
                                            v-text="index + 1"
                                        ></p>
                                    </div>
                                </td> -->
                                <td class="focus:text-indigo-600">
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="mr-2 text-base font-medium leading-none text-gray-700"
                                            v-text="user.name"
                                        ></p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <button
                                        class="px-6 py-3 text-sm leading-none text-gray-700 bg-gray-100 rounded focus:outline-none"
                                        v-text="user.email"
                                    ></button>
                                </td>
                                <td class="pl-4">
                                    <Link
                                        :href="`/users/${user.id}/edit`"
                                        class="px-5 py-3 text-sm leading-none text-gray-600 bg-gray-100 rounded focus:ring-2 focus:ring-offset-2 focus:ring-red-300 hover:bg-gray-200 focus:outline-none"
                                    >
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div
                    class="flex justify-center mt-5 space-x-2 transition-all ease-in-out"
                >
                    <pagination :links="users.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "./shared/Layout.vue";
import Pagination from "./shared/Pagination.vue";
import debounce from "lodash/debounce";
export default {
    layout: Layout,
    data() {
        return {
            search: this.filters.search,
        };
    },
    props: {
        name: String,
        users: Object,
        filters: Object,
    },
    methods: {
        // Define a debounced version of the search function
        debouncedSearch: debounce(function (val) {
            this.$inertia.get(
                "/users",
                {
                    search: val,
                },
                {
                    preserveState: true,
                    replace: true,
                }
            );
        }, 600), // 800ms is an example debounce duration
    },
    watch: {
        search(val) {
            // Call the debounced search function
            this.debouncedSearch(val);
        },
    },
    components: {
        Layout,
        Pagination,
    },
};
</script>
