<script setup>
import { onMounted } from "vue";
import { Link } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white border-gray-200 dark:bg-gray-800">
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
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 22 21"
                                >
                                    <path
                                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"
                                    />
                                    <path
                                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"
                                    />
                                </svg>
                                <span class="ms-3">Dashboard</span>
                            </Link>
                        </li>
                        <li>
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
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 20 18"
                                >
                                    <path
                                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"
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

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
