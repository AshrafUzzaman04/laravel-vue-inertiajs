<template>
    <div>
        <h1 class="text-4xl font-semibold">Home</h1>
        <Nav />
    </div>
</template>

<script>
import Nav from "./shared/Nav.vue";
export default {
    props: {
        name: String,
    },
    components: {
        Nav,
    },
};
</script>
