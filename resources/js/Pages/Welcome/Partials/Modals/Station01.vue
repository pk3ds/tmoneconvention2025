<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const emit = defineEmits(["closeModal"]);

const close = () => {
    emit("closeModal");
};
</script>
<template>
    <h2 class="text-lg font-medium text-gray-900 font-title dark:text-gray-100">
        PWRSTATION 01: Mobile & Wireless: 5G
    </h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Mobile & Wireless: 5G<br />
        In today's dynamic landscape, mobility is the key to stay ahead. TM
        One's comprehensive mobile solution bridge the gap between people,
        equipment and machine. Empowering a truly connected workforce and
        transforming business. Our Product, Service & Solution not limited to
        Mobile, we are also focusing on key wireless technology to address the
        market needs
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Private 5G:<br />
        As a Solution Consultant(SC) for an end-to-end customized solutions.
        Specializing in delivering comprehensive tailored made end-to-end
        solutions to meet the technical requirements of our customers, all while
        ensuring optimize pricing Mobile Services: Product offerings for Mobile
        Services consist of CCP, CIP, FWA, M2M & Custom Wireless: Two type of
        wireless offered under wireless which are Satellite (VSAT & Starlink)
        and Wireless (Wi-Fi Lite, Wi-Fi Premium, Customer Project)
    </p>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Mobile Services:<br />
        Mobile Services: Product offerings for Mobile Services consist of CCP,
        CIP, FWA, M2M & Custom
    </p>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Wireless:<br />
        Two type of wireless offered under wireless which are Satellite (VSAT &
        Starlink) and Wireless (Wi-Fi Lite, Wi-Fi Premium, Customer Project)
    </p>

    <div class="flex justify-between mt-6">
        <a href="https://forms.gle/nCE2QWvBNGboNcVGA " target="_blank">
            <PrimaryButton> Quiz </PrimaryButton>
        </a>
        <SecondaryButton @click="close"> Close </SecondaryButton>
    </div>
</template>
