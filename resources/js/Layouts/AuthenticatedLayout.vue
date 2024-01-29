<script setup>
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
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav
                class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 start-0"
            >
                <div
                    class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto text-gray-800"
                >
                    <button
                        type="button"
                        data-drawer-target="drawer-navigation"
                        data-drawer-show="drawer-navigation"
                        aria-controls="drawer-navigation"
                    >
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
                            ></path>
                        </svg>
                    </button>

                    <Link
                        href="/"
                        data-drawer-hide="drawer-navigation"
                        aria-controls="drawer-navigation"
                    >
                        <img
                            src="/images/Logo-Wording-Color.png"
                            class="h-8"
                            alt="TM One"
                        />
                    </Link>

                    <div
                        class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse"
                    >
                        <button
                            type="button"
                            class="flex items-center text-sm md:me-0"
                            id="user-menu-button"
                            aria-expanded="false"
                            data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom"
                        >
                            <span class="sr-only">Open user menu</span>
                            <svg
                                class="w-6 h-6"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                                fill="currentColor"
                            >
                                <path
                                    d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"
                                />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown"
                        >
                            <div class="px-4 py-3">
                                <span
                                    class="block text-sm text-gray-900 truncate dark:text-white"
                                    >{{ $page.props.auth.user.name }}</span
                                >
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400"
                                    >{{ $page.props.auth.user.email }}</span
                                >
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <Link
                                        :href="route('profile.edit')"
                                        as="button"
                                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Profile</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        :href="route('logout')"
                                        as="button"
                                        method="post"
                                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Log out</Link
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div
                id="drawer-navigation"
                class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
                tabindex="-1"
                aria-labelledby="drawer-navigation-label"
            >
                <div id="drawer-navigation-label">
                    <Link
                        href="/"
                        data-drawer-hide="drawer-navigation"
                        aria-controls="drawer-navigation"
                    >
                        <img
                            class="w-auto rounded-lg bg-ultramarine"
                            src="/images/Wording-01.png"
                            alt="TM ONE"
                        />
                    </Link>
                </div>
                <button
                    type="button"
                    data-drawer-hide="drawer-navigation"
                    aria-controls="drawer-navigation"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <svg
                        aria-hidden="true"
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div class="py-4 overflow-y-auto">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <Link
                                :href="route('dashboard')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('dashboard'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM256 416c35.3 0 64-28.7 64-64c0-17.4-6.9-33.1-18.1-44.6L366 161.7c5.3-12.1-.2-26.3-12.3-31.6s-26.3 .2-31.6 12.3L257.9 288c-.6 0-1.3 0-1.9 0c-35.3 0-64 28.7-64 64s28.7 64 64 64zM176 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM96 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm352-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                                    />
                                </svg>
                                <span class="ms-3">My Dashboard</span>
                            </Link>
                        </li>

                        <li v-if="$page.props.auth.user.group_id">
                            <Link
                                :href="route('members.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('members.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"
                                    />
                                </svg>
                                <span
                                    class="flex-1 tracking-tighter ms-3 whitespace-nowrap"
                                >
                                    PWRMEMBERS
                                </span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes(
                                    'manage stations'
                                )
                            "
                        >
                            <Link
                                :href="route('stations.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('stations.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"
                                    />
                                </svg>
                                <span
                                    class="flex-1 tracking-tighter ms-3 whitespace-nowrap"
                                >
                                    PWRSTATIONS
                                </span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes(
                                    'manage questions'
                                )
                            "
                        >
                            <button
                                type="button"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('questions.index') ||
                                        route().current('quizzes.index'),
                                }"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                aria-controls="dropdown-example"
                                data-collapse-toggle="dropdown-example"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"
                                    />
                                </svg>
                                <span
                                    class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap"
                                >
                                    PWRGAME
                                </span>
                                <svg
                                    class="w-3 h-3"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 1 4 4 4-4"
                                    />
                                </svg>
                            </button>
                            <ul
                                id="dropdown-example"
                                class="hidden py-2 space-y-2"
                            >
                                <li>
                                    <Link
                                        :href="route('questions.index')"
                                        :class="{
                                            'bg-gray-100 dark:bg-gray-600':
                                                route().current(
                                                    'questions.index'
                                                ),
                                        }"
                                        data-drawer-hide="drawer-navigation"
                                        aria-controls="drawer-navigation"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                        >Questions</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        :href="route('quizzes.index')"
                                        :class="{
                                            'bg-gray-100 dark:bg-gray-600':
                                                route().current(
                                                    'quizzes.index'
                                                ),
                                        }"
                                        data-drawer-hide="drawer-navigation"
                                        aria-controls="drawer-navigation"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                        >Quizzes</Link
                                    >
                                </li>
                            </ul>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes('manage users')
                            "
                        >
                            <Link
                                :href="route('committees.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('committees.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3l-2.9 1.7c-9.2 5.3-20.4 4-29.6-1.3s-16.1-14.5-16.1-25.1v-3.4c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v3.4c0 10.6-6.9 19.8-16.1 25.1s-20.4 6.6-29.6 1.3l-2.9-1.7c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l2.9 1.7c9.2 5.3 13.7 15.8 13.7 26.4s-4.5 21.1-13.7 26.4l-3 1.7c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3l2.9-1.7c9.2-5.3 20.4-4 29.6 1.3s16.1 14.5 16.1 25.1v3.4c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-3.4c0-10.6 6.9-19.8 16.1-25.1s20.4-6.6 29.6-1.3l2.9 1.7c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-3-1.7c-9.2-5.3-13.7-15.8-13.7-26.4s4.5-21.1 13.7-26.4l3-1.7zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Committees
                                </span>
                            </Link>
                        </li>
                        <!-- <li>
                            <Link
                                :href="route('winners.show')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('winners.show'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"
                                    />
                                </svg>
                                <span class="ms-3">Lucky Draw</span>
                            </Link>
                        </li> -->
                        <li>
                            <Link
                                :href="route('checkins.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('checkins.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Check-ins
                                </span>
                            </Link>
                        </li>
                        <!-- <li>
                            <Link
                                :href="route('passport')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('passport'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z"
                                    />
                                </svg>
                                <span class="ms-3">Passport</span>
                            </Link>
                        </li> -->
                        <li
                            v-if="
                                $page.props.permissions.includes('manage users')
                            "
                        >
                            <Link
                                :href="route('sessions.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('sessions.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192h80v56H48V192zm0 104h80v64H48V296zm128 0h96v64H176V296zm144 0h80v64H320V296zm80-48H320V192h80v56zm0 160v40c0 8.8-7.2 16-16 16H320V408h80zm-128 0v56H176V408h96zm-144 0v56H64c-8.8 0-16-7.2-16-16V408h80zM272 248H176V192h96v56z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Sessions
                                </span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes('manage users')
                            "
                        >
                            <Link
                                :href="route('winners.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('winners.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M200.6 32C205 19.5 198.5 5.8 186 1.4S159.8 3.5 155.4 16L144.7 46.2l-9.9-29.8C130.6 3.8 117-3 104.4 1.2S85 19 89.2 31.6l8.3 25-27.4-20c-10.7-7.8-25.7-5.4-33.5 5.3s-5.4 25.7 5.3 33.5L70.2 96H48C21.5 96 0 117.5 0 144V464c0 26.5 21.5 48 48 48H200.6c-5.4-9.4-8.6-20.3-8.6-32V256c0-29.9 20.5-55 48.2-62c1.8-31 17.1-58.2 40.1-76.1C271.7 104.7 256.9 96 240 96H217.8l28.3-20.6c10.7-7.8 13.1-22.8 5.3-33.5s-22.8-13.1-33.5-5.3L192.5 55.1 200.6 32zM363.5 185.5L393.1 224H344c-13.3 0-24-10.7-24-24c0-13.1 10.8-24 24.2-24c7.6 0 14.7 3.5 19.3 9.5zM272 200c0 8.4 1.4 16.5 4.1 24H272c-26.5 0-48 21.5-48 48v80H416V256h32v96H640V272c0-26.5-21.5-48-48-48h-4.1c2.7-7.5 4.1-15.6 4.1-24c0-39.9-32.5-72-72.2-72c-22.4 0-43.6 10.4-57.3 28.2L432 195.8l-30.5-39.6c-13.7-17.8-35-28.2-57.3-28.2c-39.7 0-72.2 32.1-72.2 72zM224 464c0 26.5 21.5 48 48 48H416V384H224v80zm224 48H592c26.5 0 48-21.5 48-48V384H448V512zm96-312c0 13.3-10.7 24-24 24H470.9l29.6-38.5c4.6-5.9 11.7-9.5 19.3-9.5c13.4 0 24.2 10.9 24.2 24z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Winners
                                </span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes('manage users')
                            "
                        >
                            <Link
                                :href="route('awards.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('awards.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0H133.9c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0H487.4C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Awards
                                </span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes('manage users')
                            "
                        >
                            <Link
                                :href="route('groups.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('groups.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H544c53 0 96-43 96-96V96c0-53-43-96-96-96H96zM64 96c0-17.7 14.3-32 32-32H544c17.7 0 32 14.3 32 32V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96zm159.8 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM96 309.3c0 14.7 11.9 26.7 26.7 26.7h56.1c8-34.1 32.8-61.7 65.2-73.6c-7.5-4.1-16.2-6.4-25.3-6.4H149.3C119.9 256 96 279.9 96 309.3zM461.2 336h56.1c14.7 0 26.7-11.9 26.7-26.7c0-29.5-23.9-53.3-53.3-53.3H421.3c-9.2 0-17.8 2.3-25.3 6.4c32.4 11.9 57.2 39.5 65.2 73.6zM372 289c-3.9-.7-7.9-1-12-1H280c-4.1 0-8.1 .3-12 1c-26 4.4-47.3 22.7-55.9 47c-2.7 7.5-4.1 15.6-4.1 24c0 13.3 10.7 24 24 24H408c13.3 0 24-10.7 24-24c0-8.4-1.4-16.5-4.1-24c-8.6-24.3-29.9-42.6-55.9-47zM512 176a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM320 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Groups
                                </span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes('manage users')
                            "
                        >
                            <Link
                                :href="route('users.index')"
                                :class="{
                                    'bg-gray-100 dark:bg-gray-600':
                                        route().current('users.index'),
                                }"
                                data-drawer-hide="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group"
                            >
                                <svg
                                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"
                                    />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">
                                    Users
                                </span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>

            <nav
                v-if="$page.props.permissions.includes('change password')"
                class="flex pt-20 mx-auto max-w-7xl sm:px-6 lg:px-8"
                aria-label="Breadcrumb"
            >
                <ol role="list" class="flex px-6 space-x-4">
                    <li class="flex">
                        <div class="flex items-center">
                            <Link
                                :href="route('dashboard')"
                                class="text-gray-400 hover:text-gray-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"
                                    class="flex-shrink-0 w-5 h-5"
                                    aria-hidden="true"
                                >
                                    <path
                                        d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"
                                    />
                                </svg>
                                <span class="sr-only">Home</span>
                            </Link>
                        </div>
                    </li>
                    <slot name="breadcrumb" />
                </ol>
            </nav>

            <div v-else class="flex pt-20 mx-auto max-w-7xl sm:px-6 lg:px-8" />

            <!-- Page Content -->
            <main>
                <slot />
            </main>

            <div
                v-if="showFlash && flash.success"
                @click="showFlash = false"
                id="toast-bottom-left"
                class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-green-800 bg-green-300 divide-x divide-gray-200 rounded-lg shadow cursor-pointer rtl:divide-x-reverse bottom-5 left-5"
                role="alert"
            >
                <div class="flex items-center gap-2 text-sm font-normal">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-5 h-5"
                        fill="currentColor"
                    >
                        <path
                            d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"
                        />
                    </svg>
                    {{ flash.success }}
                </div>
            </div>

            <div
                v-if="showFlash && flash.warning"
                @click="showFlash = false"
                id="toast-bottom-left"
                class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-yellow-800 bg-yellow-300 divide-x divide-gray-200 rounded-lg shadow cursor-pointer rtl:divide-x-reverse bottom-5 left-5"
                role="alert"
            >
                <div class="flex items-center gap-2 text-sm font-normal">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-5 h-5"
                        fill="currentColor"
                    >
                        <path
                            d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                        />
                    </svg>
                    {{ flash.warning }}
                </div>
            </div>

            <div
                v-if="showFlash && flash.error"
                @click="showFlash = false"
                id="toast-bottom-left"
                class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-red-800 bg-red-300 divide-x divide-gray-200 rounded-lg shadow cursor-pointer rtl:divide-x-reverse bottom-5 left-5"
                role="alert"
            >
                <div class="flex items-center gap-2 text-sm font-normal">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-5 h-5"
                        fill="currentColor"
                    >
                        <path
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"
                        />
                    </svg>
                    {{ flash.error }}
                </div>
            </div>
        </div>
    </div>
</template>
