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
        PWRSTATION 02: Cybersecurity: Secure Service Edge (SSE)
    </h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Secure Service Edge (SSE) is a combination of network security functions
        such as SWG, CASB, FWaaS and ZTNA.
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        SSE is a subset of Secure Access Service Edge (SASE)
    </p>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        SSE deliver security and other services via the cloud
    </p>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        SSE replaces traditional solutions like client SSL VPN, on-premises
        firewalls, and internet proxies, offering a transformative shift in
        network security
    </p>

    <div class="flex justify-between mt-6">
        <a href="https://forms.gle/rVqCSoperL1PcNNX6" target="_blank">
            <PrimaryButton> Quiz </PrimaryButton>
        </a>
        <SecondaryButton @click="close"> Close </SecondaryButton>
    </div>
</template>
