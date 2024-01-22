<script setup>
import { Link } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";
import { onMounted } from "vue";

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div class="min-h-screen bg-tmone">
        <nav
            class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 start-0"
        >
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
            >
                <Link
                    href="/"
                    class="flex items-center space-x-3 rtl:space-x-reverse"
                >
                    <img
                        src="/images/Logo-Color.png"
                        class="h-8"
                        alt="TM One"
                    />
                </Link>
                <div
                    class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse"
                >
                    <!-- FIXME enable login button -->
                    <!-- <button
                        type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-ultramarine hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-ultramarine dark:focus:ring-blue-800"
                    >
                        Get started
                    </button> -->
                    <button
                        data-collapse-toggle="navbar-sticky"
                        type="button"
                        class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="navbar-sticky"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="navbar-sticky"
                >
                    <ul
                        class="flex flex-col p-4 mt-4 font-medium text-gray-900 border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white"
                    >
                        <li>
                            <Link
                                href="/"
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent md:hover:text-ultramarine md:p-0"
                                :class="{
                                    'bg-ultramarine md:text-ultramarine text-white hover:text-gray-900':
                                        route().current('/'),
                                }"
                                >Home</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('programme')"
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent md:hover:text-ultramarine md:p-0"
                                :class="{
                                    'bg-ultramarine md:text-ultramarine text-white hover:text-gray-900':
                                        route().current('programme'),
                                }"
                                >Programme</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('attire')"
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent md:hover:text-ultramarine md:p-0"
                                :class="{
                                    'bg-ultramarine md:text-ultramarine text-white hover:text-gray-900':
                                        route().current('attire'),
                                }"
                                >Dress Code</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="mt-8">
            <slot />
        </div>
    </div>

    <img
        class="fixed bottom-0 left-0 z-0 max-w-48"
        src="/images/Chevron-01.png"
        alt="TM ONE"
    />
</template>
