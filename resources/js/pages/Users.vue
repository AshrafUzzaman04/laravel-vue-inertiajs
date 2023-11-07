<template>
    <div>
        <h1 class="text-4xl font-semibold">Users</h1>
        <Nav />

        <h2 style="margin-top: 100vh">Current Time {{ time }}</h2>
        <Link href="/users" class="text-blue-600" preserve-scroll>Refresh</Link>
    </div>
</template>

<script>
import Nav from "./shared/Nav.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Nav,
        Link,
    },
    props: {
        time: String,
    },
};
</script>
