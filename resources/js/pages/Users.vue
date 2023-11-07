<template>
    <Head title="Users" />
    <div class="max-w-6xl mx-auto my-3">
        <h1 class="text-4xl font-semibold">Users</h1>
    </div>
</template>

<script>
import Layout from "./shared/Layout.vue";
export default {
    layout: Layout,
    props: {
        name: String,
    },
    components: {
        Layout,
    },
};
</script>
