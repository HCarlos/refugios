import './bootstrap';
import '../css/app.css';
// import 'https://polyfill.io/v3/polyfill.min.js?features=default';
// import 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=weather&key=AIzaSyB0mmrw3wLssGqd1eUKWAH43GEcn5bm8-s&callback=initMap&v=weekly';
// import $ from "jquery";

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
