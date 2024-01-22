<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
import { Head } from "@inertiajs/vue3";
import DayOne from "./Partials/DayOne.vue";
import DayTwo from "./Partials/DayTwo.vue";
</script>

<template>
    <Head title="Programme - TM One Convention 2024" />
    <SiteLayout>
        <div class="relative z-10 py-12">
            <DayOne />
        </div>

        <div class="relative z-10 pb-12">
            <DayTwo />
        </div>
    </SiteLayout>
</template>
