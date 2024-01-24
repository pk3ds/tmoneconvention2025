<script setup>
import { Countdown } from "vue3-flip-countdown";
</script>

<template>
    <div class="relative px-6 bg-white isolate py-14 lg:px-8">
        <div
            class="absolute inset-x-0 overflow-hidden -z-10"
            aria-hidden="true"
        >
            <div class="relative" />
        </div>
        <div class="max-w-2xl py-12 mx-auto">
            <div class="text-center">
                <h1
                    class="text-2xl tracking-tight text-gray-900 uppercase font-title sm:text-4xl"
                >
                    TM One Convention is back
                </h1>
                <p class="my-6 text-lg leading-8 text-gray-500">
                    Be inspired by world class industry leaders and discover
                    what it takes to innovate and create human centred
                    technology to enable your next digital transformation.
                </p>
                <div class="flex items-center justify-center gap-x-6">
                    <Countdown
                        deadlineISO="2024-01-29 07:00:00"
                        mainColor="#FF5E00"
                        labelColor="#FF5E00"
                        mainFlipBackgroundColor="#FFF"
                        secondFlipBackgroundColor="#FFF"
                    />
                </div>
            </div>
        </div>
        <div
            class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true"
        >
            <div class="relative" />
        </div>
    </div>
</template>
