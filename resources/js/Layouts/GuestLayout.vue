<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { onMounted, computed, ref, watch } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";

onMounted(() => {
    initFlowbite();
});

const page = usePage();

const showFlash = ref(false);

const flash = computed(function () {
    return page.props.flash;
});

watch(
    page.props,
    function (val) {
        if (val?.flash) {
            showFlash.value = true;
        }
    },
    {
        immediate: true,
        deep: true,
    }
);

const particlesLoaded = async (container) => {
    console.log("Particles container loaded", container);
};
</script>

<template>
    <div
        class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 bg-light-blue"
    >
        <div class="z-10">
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 text-gray-500 fill-current" />
            </Link>
        </div>

        <div
            class="z-10 w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg"
        >
            <slot />
        </div>
    </div>

    <div class="-z-10">
        <vue-particles
            id="tsparticles"
            :particlesLoaded="particlesLoaded"
            :options="{
                fpsLimit: 100,
                interactivity: {
                    detect_on: 'window',
                    events: {
                        onClick: {
                            enable: true,
                            mode: 'push',
                        },
                        onHover: {
                            enable: true,
                            mode: 'repulse',
                        },
                        resize: true,
                    },
                    modes: {
                        trail: {
                            distance: 400,
                            duration: 2,
                            opacity: 0.2,
                            size: 40,
                        },
                        push: {
                            quantity: 4,
                        },
                        repulse: {
                            distance: 100,
                            duration: 0.4,
                        },
                    },
                },
                particles: {
                    color: {
                        value: '#FF5E00',
                    },
                    links: {
                        color: '#FF5E00',
                        distance: 150,
                        enable: true,
                        opacity: 1,
                        width: 1,
                    },
                    collisions: {
                        enable: true,
                    },
                    move: {
                        direction: 'none',
                        enable: true,
                        outMode: 'bounce',
                        random: false,
                        speed: 1,
                        straight: false,
                    },
                    number: {
                        density: {
                            enable: true,
                            area: 800,
                        },
                        value: 150,
                    },
                    opacity: {
                        value: 0.2,
                    },
                    shape: {
                        type: 'circle',
                    },
                    size: {
                        random: true,
                        value: 5,
                    },
                },
                detectRetina: true,
            }"
        />
    </div>

    <div
        v-if="showFlash && flash.success"
        id="sticky-banner"
        tabindex="-1"
        class="fixed top-0 z-50 flex justify-between w-full p-4 border-b border-green-200 start-0 bg-green-50"
    >
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm font-normal">
                <span
                    class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 p-1 bg-green-200 rounded-full me-3"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-3 h-3 text-green-500"
                        fill="currentColor"
                    >
                        <path
                            d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"
                        />
                    </svg>
                </span>
                <span>{{ flash.success }} </span>
            </p>
        </div>
        <div class="flex items-center">
            <button
                data-dismiss-target="#sticky-banner"
                type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white"
            >
                <svg
                    class="w-3 h-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>

    <div
        v-if="showFlash && flash.warning"
        id="sticky-banner"
        tabindex="-1"
        class="fixed top-0 z-50 flex justify-between w-full p-4 border-b border-yellow-200 start-0 bg-yellow-50"
    >
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm font-normal">
                <span
                    class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 p-1 bg-yellow-200 rounded-full me-3"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-3 h-3 text-yellow-500"
                        fill="currentColor"
                    >
                        <path
                            d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                        />
                    </svg>
                </span>
                <span>{{ flash.warning }} </span>
            </p>
        </div>
        <div class="flex items-center">
            <button
                data-dismiss-target="#sticky-banner"
                type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white"
            >
                <svg
                    class="w-3 h-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>

    <div
        v-if="showFlash && flash.error"
        id="sticky-banner"
        tabindex="-1"
        class="fixed top-0 z-50 flex justify-between w-full p-4 border-b border-red-200 start-0 bg-red-50"
    >
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm font-normal">
                <span
                    class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 p-1 bg-red-200 rounded-full me-3"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-3 h-3 text-red-500"
                        fill="currentColor"
                    >
                        <path
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"
                        />
                    </svg>
                </span>
                <span>{{ flash.error }} </span>
            </p>
        </div>
        <div class="flex items-center">
            <button
                data-dismiss-target="#sticky-banner"
                type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white"
            >
                <svg
                    class="w-3 h-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>
</template>
