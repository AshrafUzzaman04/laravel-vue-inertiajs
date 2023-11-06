<template>
    <div>
        <h1>Home {{ name }}</h1>
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
