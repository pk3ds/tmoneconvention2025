<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Attire from "./Partials/Attire.vue";
import DayOne from "./Partials/DayOne.vue";
import DayTwo from "./Partials/DayTwo.vue";
</script>

<template>
    <Head title="Info Pack - TM One Convention 2024" />
    <div class="min-h-screen bg-tmone">
        <header class="bg-white">
            <nav class="px-6 mx-auto max-w-7xl lg:px-8" aria-label="Top">
                <!-- FIXME justify between when enabling login -->
                <div class="flex items-center justify-center w-full py-3">
                    <div class="flex items-center">
                        <Link :href="route('/')">
                            <span class="sr-only">TM ONE</span>
                            <img
                                class="w-auto h-10"
                                src="/images/Logo-Color.png"
                                alt="TM ONE"
                            />
                        </Link>
                    </div>
                    <!-- FIXME enable login -->
                    <!-- <div class="ml-10 space-x-4">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="inline-block px-4 py-2 text-base font-medium text-white border border-transparent rounded-md bg-ultramarine hover:bg-cobalt-blue"
                            >Dashboard</Link
                        >
                        <Link
                            v-else
                            :href="route('login')"
                            class="inline-block px-4 py-2 text-base font-medium text-white border border-transparent rounded-md bg-ultramarine hover:bg-cobalt-blue"
                            >Login</Link
                        >
                    </div> -->
                </div>
            </nav>
        </header>

        <div class="relative z-10 py-12" id="programme">
            <DayOne />
        </div>

        <div class="relative z-10 pb-12">
            <DayTwo />
        </div>

        <div class="relative z-10 pb-12" id="attire">
            <Attire />
        </div>
    </div>

    <img
        class="fixed bottom-0 left-0 z-0 max-w-48"
        src="/images/Chevron-01.png"
        alt="TM ONE"
    />
</template>
