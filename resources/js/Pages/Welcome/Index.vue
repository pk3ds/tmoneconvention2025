<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
import { Countdown } from "vue3-flip-countdown";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="TM One Convention 2024" />
    <SiteLayout>
        <div class="relative z-10 overflow-hidden isolate">
            <div class="max-w-2xl py-12 mx-auto">
                <div class="text-center">
                    <img
                        src="/images/Wording-01.png"
                        alt="TM ONE CONVENTION 2024"
                    />
                    <h1
                        class="my-6 text-2xl font-bold tracking-tight text-white sm:text-4xl"
                    >
                        Royale Chulan Seremban
                        <br />
                        <span class="text-lg text-white sm:text-2xl">
                            29<sup>th</sup> - 30<sup>th</sup> January 2024
                        </span>
                    </h1>
                    <!-- <p class="my-6 text-lg leading-8 text-gray-300">
                        "See you at the intersection of laughter and memories!"
                    </p> -->

                    <Countdown
                        class=""
                        deadlineISO="2024-01-29 07:00:00"
                        mainColor="#FFF"
                        labelColor="#FFF"
                    />
                    <!-- FIXME enable links if required -->
                    <div class="flex items-center justify-center mt-10 gap-x-6">
                        <Link
                            :href="route('programme')"
                            class="rounded-md bg-accent-orange px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-accent-orange/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-orange/80"
                            >Learn more</Link
                        >
                        <!-- <Link
                    :href="route('programme')"
                    class="text-sm font-semibold leading-6 text-white"
                    >Learn more <span aria-hidden="true">→</span></Link
                > -->
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>
