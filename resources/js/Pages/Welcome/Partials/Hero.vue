<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <img
        src="/images/BG-02-2025.png"
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
    <div class="flex items-center max-w-2xl mx-auto h-[calc(100vh-55px)]">
        <div class="text-center">
            <img
                src="/images/Wording-02-2025.png"
                alt="TM ONE CONVENTION 2025"
            />
            <h1
                class="my-6 text-2xl font-bold tracking-tight text-black uppercase font-title sm:text-3xl"
            >
                14 - 15 January 2025

                <br />
                <span class="text-lg text-black sm:text-2xl">
                    WYNDHAM ION MAJESTIC HOTEL GENTING HIGHLANDS
                </span>
            </h1>

            <!-- FIXME enable links if required -->
            <!-- <div class="flex items-center justify-center mt-10 gap-x-6">
                <a
                    target="_blank"
                    href="https://forms.office.com/r/grG3rbEQBg"
                    class="bg-accent-orange px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-cobalt-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cobalt-blue"
                    >Post Convention Survey</a
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
</template>
