<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
import Agenda from "./Partials/Agenda.vue";
import Hero from "./Partials/Hero.vue";
import Countdown from "./Partials/Countdown.vue";
import Attire from "./Partials/Attire.vue";
import Map from "./Partials/Map.vue";
import Leaderboard from "./Partials/Leaderboard.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    leaderboards: Object,
    groups: Object,
});
</script>

<template>
    <Head title="TM One Convention 2024" />
    <SiteLayout>
        <div class="overflow-hidden isolate pt-14" id="main">
            <Hero />
        </div>

        <div class="" id="countdown">
            <Countdown />
        </div>

        <!-- <div class="" id="agenda">
            <Agenda />
        </div>

        <div class="py-12" id="dress-code">
            <Attire />
        </div> -->

        <!-- Hiding pwrgames -->
        <!-- <div class="py-12" id="pwrgame">
            <Map />
        </div> -->

        <!-- <div class="py-12" id="pwrteam">
            <Leaderboard :leaderboards="leaderboards" :groups="groups" />
        </div> -->
    </SiteLayout>
</template>
