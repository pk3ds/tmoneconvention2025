import './bootstrap';
import '../css/app.css';
import 'flowbite';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import Particles from "@tsparticles/vue3";
import { loadFull } from "tsparticles";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => title ? `${title}` : `${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Particles, {
                init: async engine => {
                    await loadFull(engine);
                },
            })
            .mount(el);
    },
    progress: {
        color: '#FF5E00',
    },
});
