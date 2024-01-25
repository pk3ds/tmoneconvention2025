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
            <div
                v-if="$page.props.flash.success"
                id="sticky-banner-success"
                tabindex="-1"
                class="fixed top-0 z-50 flex justify-between w-full p-5 bg-green-400 border-b border-gray-200 start-0"
            >
                <div class="flex items-center mx-auto">
                    <p
                        class="flex items-center text-sm font-normal text-gray-900"
                    >
                        <span
                            class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 p-1 rounded-full me-3"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"
                                />
                            </svg>
                        </span>
                        <span>
                            {{ $page.props.flash.success }}
                        </span>
                    </p>
                </div>
                <div class="flex items-center">
                    <button
                        data-dismiss-target="#sticky-banner-success"
                        type="button"
                        class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-900 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5"
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
                    </button>
                </div>
            </div>

            <div
                v-if="$page.props.flash.warning"
                id="sticky-banner-warning"
                tabindex="-1"
                class="fixed top-0 z-50 flex justify-between w-full p-5 bg-yellow-300 border-b border-gray-200 start-0"
            >
                <div class="flex items-center mx-auto">
                    <p
                        class="flex items-center text-sm font-normal text-gray-900"
                    >
                        <span
                            class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 p-1 rounded-full me-3"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                                />
                            </svg>
                        </span>
                        <span> {{ $page.props.flash.warning }} </span>
                    </p>
                </div>
                <div class="flex items-center">
                    <button
                        data-dismiss-target="#sticky-banner-warning"
                        type="button"
                        class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-900 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5"
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
                    </button>
                </div>
            </div>

            <div
                v-if="$page.props.flash.error"
                id="sticky-banner-error"
                tabindex="-1"
                class="fixed top-0 z-50 flex justify-between w-full p-5 bg-red-500 border-b border-gray-200 start-0"
            >
                <div class="flex items-center mx-auto">
                    <p
                        class="flex items-center text-sm font-normal text-gray-900"
                    >
                        <span
                            class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 p-1 rounded-full me-3"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"
                                />
                            </svg>
                        </span>
                        <span> {{ $page.props.flash.error }} </span>
                    </p>
                </div>
                <div class="flex items-center">
                    <button
                        data-dismiss-target="#sticky-banner-error"
                        type="button"
                        class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-900 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5"
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
                    </button>
                </div>
            </div>

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
            <main class="mt-8">
                <slot />
            </main>
        </div>
    </div>
</template>
