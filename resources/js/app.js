import { createApp, h } from "vue";
import NProgress from "nprogress";
import { createInertiaApp, router, Head } from "@inertiajs/vue3";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    //__Use head or any other componets for automatically import that all the pages__//
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Head", Head)
            .mount(el);
    },

    //__Use title for all the components & pages__//
    title: (title) => `My App - ${title}`,
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: "red",

        // Whether to include the default NProgress styles...
        includeCSS: true,
    },
});

router.on("start", () => NProgress.start());
router.on("finish", () => NProgress.done());
