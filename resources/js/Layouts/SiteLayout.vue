<script setup>
import { Link } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";
import { onMounted, ref } from "vue";

onMounted(() => {
    initFlowbite();
});

let showWhiteNavbar = ref(false);

document.addEventListener("scroll", function () {
    let topPosition = document.body.getBoundingClientRect().top;

    if (topPosition < -50) {
        showWhiteNavbar.value = true;
    } else {
        showWhiteNavbar.value = false;
    }
});
</script>

<template>
    <div class="min-h-screen">
        <nav
            class="fixed top-0 z-20 w-full start-0"
            :class="{
                'bg-white transition duration-300 ease-in border-b border-gray-300':
                    showWhiteNavbar,
            }"
        >
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
            >
                <span class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img
                        v-if="showWhiteNavbar"
                        src="/images/Logo-Wording-Color.png"
                        class="h-8"
                        alt="TM One"
                    />
                    <img
                        v-if="!showWhiteNavbar"
                        src="/images/Logo-Wording-White.png"
                        class="h-8"
                        alt="TM One"
                    />
                </span>
                <div
                    class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse"
                >
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        type="button"
                        class="flex px-4 py-3 text-sm font-medium text-center text-white uppercase font-title bg-accent-orange hover:bg-cobalt-blue focus:ring-4 focus:outline-none focus:ring-blue-300"
                    >
                        Dashboard
                    </Link>
                    <Link
                        v-else
                        :href="route('login')"
                        type="button"
                        class="flex px-4 py-3 text-sm font-medium text-center text-white uppercase font-title bg-accent-orange hover:bg-cobalt-blue focus:ring-4 focus:outline-none focus:ring-blue-300"
                    >
                        Login
                    </Link>
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
                        class="flex flex-col p-4 mt-4 font-medium uppercase border border-gray-100 rounded-lg font-title text-cobalt-blue md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent"
                        :class="{ 'md:text-white': !showWhiteNavbar }"
                    >
                        <li>
                            <Link
                                href="#main"
                                v-smooth-scroll
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"
                                >Main</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="#countdown"
                                v-smooth-scroll
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"
                                >Countdown</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="#agenda"
                                v-smooth-scroll
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"
                                >Agenda</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="#dress-code"
                                v-smooth-scroll
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"
                                >Dress Code</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="#pwrgame"
                                v-smooth-scroll
                                class="block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"
                                >PWRGAME</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <slot />
        </div>
    </div>

    <img
        class="fixed bottom-0 left-0 z-0 max-w-48"
        src="/images/Chevron-01.png"
        alt="TM ONE"
    />
</template>
