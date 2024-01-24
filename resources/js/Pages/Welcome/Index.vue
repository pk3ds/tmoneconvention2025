<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
import Agenda from "./Partials/Agenda.vue";
import Hero from "./Partials/Hero.vue";
import Countdown from "./Partials/Countdown.vue";
import DayOne from "./Partials/DayOne.vue";
import DayTwo from "./Partials/DayTwo.vue";
import Attire from "./Partials/Attire.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="TM One Convention 2024" />
    <SiteLayout>
        <div class="relative z-10 overflow-hidden isolate pt-14" id="main">
            <Hero />
        </div>

        <div class="relative z-10">
            <Countdown />
        </div>

        <!-- <div class="relative z-10" id="agenda">
            <Agenda />
        </div> -->

        <div class="relative z-10 py-12" id="agenda">
            <DayOne />
        </div>

        <div class="relative z-10 pb-12">
            <DayTwo />
        </div>

        <div class="relative z-10 py-12" id="dress-code">
            <Attire />
        </div>
    </SiteLayout>
</template>
