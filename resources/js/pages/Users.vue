<template>
    <Head title="Users" />
    <div class="max-w-6xl mx-auto my-3">
        <h1 class="text-4xl font-semibold">Users</h1>

        <!-- table content -->
        <div class="w-full sm:px-6">
            <div class="px-4 py-4 bg-white md:py-7 md:px-8 xl:px-10">
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
                <div class="flex justify-center mt-5">
                    <pagination :links="users.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "./shared/Layout.vue";
import Pagination from "./shared/Pagination.vue";
export default {
    layout: Layout,
    props: {
        name: String,
        users: Object,
    },
    components: {
        Layout,
        Pagination,
    },
};
</script>
