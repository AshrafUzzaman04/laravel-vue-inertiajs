<template>
    <Layout>
        <div class="max-w-6xl mx-auto my-3">
            <h1 class="text-4xl font-semibold">Settings</h1>
        </div>
    </Layout>
</template>

<script>
import Layout from "./shared/Layout.vue";
export default {
    props: {
        name: String,
    },
    components: {
        Layout,
    },
};
</script>
