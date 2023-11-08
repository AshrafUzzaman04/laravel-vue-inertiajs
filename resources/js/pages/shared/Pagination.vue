<template>
    <Component
        :is="link.url ? 'Link' : 'span'"
        v-for="(link, index) in links"
        :key="index"
        :href="link.url"
        v-html="link.label"
        class="px-2 transition-all"
        :class="{
            'text-gray-500': !link.url,
            'font-bold scale-125 text-white bg-violet-500 rounded-md':
                link.active,
        }"
        preserve-scroll
    />
</template>

<script>
export default {
    props: {
        links: Array,
        active: Boolean,
    },
};
</script>
