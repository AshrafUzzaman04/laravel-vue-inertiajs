<template>
    <header class="flex justify-between bg-gray-100 p-6">
        <div class="items-center">
            <h1 class="text-2xl font-semibold">My App</h1>
            <small v-if="username" class="text-sm items-center"
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
    },
    computed: {
        username() {
            return this.$page.props.auth.user.name;
        },
    },
};
</script>
