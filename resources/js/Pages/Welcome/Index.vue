<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Countdown } from "vue3-flip-countdown";

const navigation = [
    { name: "Agenda", href: "#" },
    { name: "Venue", href: "#" },
    { name: "Speakers", href: "#" },
    { name: "Booths", href: "#" },
    { name: "BookDoc", href: "#" },
];
</script>

<template>
    <Head title="Welcome" />
    <div
        class="min-h-screen"
        style="
            background-image: url('/images/BG-TM-One-Plain.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        "
    >
        <header class="bg-white dark:bg-cobalt-blue">
            <nav class="px-6 mx-auto max-w-7xl lg:px-8" aria-label="Top">
                <div
                    class="flex items-center justify-between w-full py-3 border-b border-indigo-500 lg:border-none"
                >
                    <div class="flex items-center">
                        <Link href="#">
                            <span class="sr-only">TM ONE</span>
                            <img
                                class="flex w-auto h-10 dark:hidden"
                                src="/images/TM-One-Color.png"
                                alt="TM ONE"
                            />
                            <img
                                class="hidden w-auto h-10 dark:flex"
                                src="/images/TM-One-White.png"
                                alt="TM ONE"
                            />
                        </Link>
                        <div class="hidden ml-10 space-x-8 lg:block">
                            <Link
                                v-for="link in navigation"
                                :key="link.name"
                                :href="link.href"
                                class="text-base font-medium text-ultramarine dark:text-white hover:text-cobalt-blue dark:hover:text-light-blue"
                                >{{ link.name }}</Link
                            >
                        </div>
                    </div>
                    <div class="ml-10 space-x-4">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="inline-block px-4 py-2 text-base font-medium text-white border border-transparent rounded-md dark:text-ultramarine bg-ultramarine dark:bg-white hover:bg-cobalt-blue dark:hover:bg-light-blue"
                            >Dashboard</Link
                        >
                        <Link
                            v-else
                            :href="route('login')"
                            class="inline-block px-4 py-2 text-base font-medium text-white border border-transparent rounded-md dark:text-ultramarine bg-ultramarine dark:bg-white hover:bg-cobalt-blue dark:hover:bg-light-blue"
                            >Login</Link
                        >
                    </div>
                </div>
                <div
                    class="flex flex-wrap justify-center py-4 gap-x-6 lg:hidden"
                >
                    <Link
                        v-for="link in navigation"
                        :key="link.name"
                        :href="link.href"
                        class="text-base font-medium text-ultramarine dark:text-white hover:text-cobalt-blue dark:hover:light-blue"
                        >{{ link.name }}</Link
                    >
                </div>
            </nav>
        </header>

        <div class="relative z-10 overflow-hidden isolate pt-14">
            <div class="max-w-2xl py-12 mx-auto">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative px-3 py-1 text-sm leading-6 text-gray-400 rounded-full ring-1 ring-white/10 hover:ring-white/20"
                    >
                        Announcing our upcoming convention.
                        <Link href="#" class="font-semibold text-white"
                            ><span
                                class="absolute inset-0"
                                aria-hidden="true"
                            />Read more
                            <span aria-hidden="true">&rarr;</span></Link
                        >
                    </div>
                </div>
                <div class="text-center">
                    <img
                        src="/images/Wording-02.png"
                        alt="TM ONE CONVENTION 2024"
                    />
                    <Countdown
                        class=""
                        deadlineISO="2024-01-28 09:00:00"
                        mainColor="#FFF"
                        labelColor="#FFF"
                    />
                    <div class="flex items-center justify-center mt-10 gap-x-6">
                        <Link
                            href="#"
                            class="rounded-md bg-accent-orange px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-accent-orange/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-orange/80"
                            >Get started</Link
                        >
                        <Link
                            href="#"
                            class="text-sm font-semibold leading-6 text-white"
                            >Learn more <span aria-hidden="true">→</span></Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img
        class="fixed bottom-0 left-0 z-0 max-w-48"
        src="/images/Chevron-06.png"
        alt="TM ONE"
    />
</template>
