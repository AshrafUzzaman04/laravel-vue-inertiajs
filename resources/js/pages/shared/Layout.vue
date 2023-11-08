<template>
    <Head>
        <meta name="description" content="My app App page" />
    </Head>
    <header class="sticky top-0 z-50 flex justify-between p-6 bg-gray-100">
        <div class="items-center">
            <h1 class="text-2xl font-semibold">My App</h1>
            <small v-if="username" class="items-center text-sm"
                >Welcome back! {{ username }}</small
            >
        </div>
        <Nav></Nav>
    </header>
    <slot />
</template>

<script>
import Nav from "./Nav.vue";

export default {
    components: {
        Nav,
    },
    props: {
        name: String,
        title: String,
    },
    computed: {
        username() {
            return this.$page.props.auth.user.name;
        },
    },
};
</script>
