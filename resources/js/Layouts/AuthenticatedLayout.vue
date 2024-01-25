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
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav
                class="fixed top-0 z-20 w-full bg-white border-gray-200 start-0"
            >
                <div
                    class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
                >
                    <button
                        type="button"
                        data-drawer-target="drawer-navigation"
                        data-drawer-show="drawer-navigation"
                        aria-controls="drawer-navigation"
                    >
                        <img
                            class="block w-auto text-gray-800 fill-current dark:hidden h-9 dark:text-gray-200"
                            src="/images/Logo-Color.png"
                            alt="TM ONE"
                        />
                        <img
                            class="hidden w-auto text-gray-800 fill-current dark:block h-9 dark:text-gray-200"
                            src="/images/Logo-White.png"
                            alt="TM ONE"
                        />
                    </button>
                    <div
                        class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse"
                    >
                        <button
                            type="button"
                            class="flex items-center text-sm md:me-0 dark:text-white"
                            id="user-menu-button"
                            aria-expanded="false"
                            data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom"
                        >
                            <span class="sr-only">Open user menu</span>
                            {{ $page.props.auth.user.name }}
                            <svg
                                class="ms-2 -me-0.5 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
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
                                    class="block text-sm text-gray-900 dark:text-white"
                                    >{{ $page.props.auth.user.staff_id }}</span
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
                                    viewBox="0 0 576 512"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z"
                                    />
                                </svg>
                                <span class="ms-3">Dashboard</span>
                            </Link>
                        </li>
                        <li
                            v-if="
                                $page.props.permissions.includes('view users')
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
                                $page.props.permissions.includes('view users')
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
