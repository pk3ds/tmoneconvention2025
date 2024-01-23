<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
import DayOne from "./Partials/DayOne.vue";
import DayTwo from "./Partials/DayTwo.vue";
import { Countdown } from "vue3-flip-countdown";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="TM One Convention 2024" />
    <SiteLayout>
        <div class="relative z-10 overflow-hidden isolate pt-14" id="main">
            <img
                src="/images/BG-01-Plain.jpg"
                alt=""
                class="absolute inset-0 object-cover w-full h-full -z-10"
            />
            <div
                class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80"
                aria-hidden="true"
            >
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div class="max-w-2xl py-24 mx-auto">
                <div class="text-center">
                    <img
                        src="/images/Wording-01.png"
                        alt="TM ONE CONVENTION 2024"
                    />
                    <h1
                        class="my-6 text-2xl font-bold tracking-tight text-white uppercase font-title sm:text-3xl"
                    >
                        29<sup>th</sup> - 30<sup>th</sup> January 2024

                        <br />
                        <span class="text-lg text-white sm:text-2xl">
                            Royale Chulan Seremban
                        </span>
                    </h1>

                    <Countdown
                        deadlineISO="2024-01-29 07:00:00"
                        mainColor="#FFF"
                        labelColor="#FFF"
                    />
                    <!-- FIXME enable links if required -->
                    <!-- <div class="flex items-center justify-center mt-10 gap-x-6">
                        <Link
                            href="#"
                            class="rounded-md bg-accent-orange px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-accent-orange/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-orange/80"
                            >Learn more</Link
                        >
                        <Link
                            href="#"
                            class="text-sm font-semibold leading-6 text-white"
                            >Learn more <span aria-hidden="true">→</span></Link
                        >
                    </div> -->
                </div>
            </div>
            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true"
            >
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
        </div>

        <div class="relative z-10 py-12" id="agenda">
            <DayOne />
        </div>

        <div class="relative z-10 pb-12">
            <DayTwo />
        </div>

        <div class="relative z-10 py-12" id="dress-code">
            <div
                class="max-w-screen-xl py-8 mx-auto bg-gray-50 dark:bg-gray-800 rounded-2xl"
            >
                <div class="px-6 mx-auto max-w-7xl lg:px-8">
                    <div class="max-w-2xl mx-auto text-center">
                        <h2
                            class="text-3xl font-bold tracking-tight text-ultramarine dark:text-light-blue sm:text-4xl"
                        >
                            Dress Code
                        </h2>
                        <p
                            class="mt-2 text-lg leading-8 text-gray-500 dark:text-gray-400"
                        >
                            Please adhere to our attire guidelines.
                        </p>
                    </div>
                    <div
                        class="grid max-w-2xl grid-cols-1 gap-8 mx-auto mt-8 auto-rows-fr lg:mx-0 lg:max-w-none lg:grid-cols-2"
                    >
                        <article
                            class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden transition duration-500 cursor-pointer dark:bg-navy-blue bg-light-blue isolate rounded-2xl pt-80 sm:pt-48 lg:pt-80 hover:scale-105"
                        >
                            <img
                                src="/images/Attire-01.png"
                                alt="Attire Day 1"
                                class="absolute inset-0 object-cover w-full h-full -z-10"
                            />
                            <div
                                class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"
                            />
                            <div
                                class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"
                            />
                            <div
                                class="flex flex-wrap items-center overflow-hidden text-sm leading-6 text-gray-300 gap-y-1"
                            >
                                <div class="flex items-center -ml-4 gap-x-4">
                                    <svg
                                        viewBox="0 0 2 2"
                                        class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50"
                                    >
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                </div>
                            </div>
                            <h3
                                class="mt-3 text-lg font-semibold leading-6 text-white"
                            >
                                <span>
                                    <span class="absolute inset-0" />
                                    Day 1<br />
                                    YNIN T-shirt<br />
                                    Team Dress code
                                </span>
                            </h3>
                        </article>

                        <article
                            class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden transition duration-500 cursor-pointer dark:bg-navy-blue bg-light-blue isolate rounded-2xl pt-80 sm:pt-48 lg:pt-80 hover:scale-105"
                        >
                            <img
                                src="/images/Attire-02.png"
                                alt="Attire Day 2"
                                class="absolute inset-0 object-cover w-full h-full -z-10"
                            />
                            <div
                                class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"
                            />
                            <div
                                class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"
                            />
                            <div
                                class="flex flex-wrap items-center overflow-hidden text-sm leading-6 text-gray-300 gap-y-1"
                            >
                                <div class="flex items-center -ml-4 gap-x-4">
                                    <svg
                                        viewBox="0 0 2 2"
                                        class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50"
                                    >
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                </div>
                            </div>
                            <h3
                                class="mt-3 text-lg font-semibold leading-6 text-white"
                            >
                                <span>
                                    <span class="absolute inset-0" />
                                    Day 2<br />
                                    Jacket <br />
                                    TM One T-shirt <br />
                                    Hijab (Blue/ Navy)
                                </span>
                            </h3>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>
