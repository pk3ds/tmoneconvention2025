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
        PWRSTATION 04: BPO: AI, Automation & Data Science
    </h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        BPO: AI, Automation & Data Science
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        A. Customer-Experience-as-a-Service (CXaaS):<br />
        <ol class="px-2 mt-1 text-sm text-gray-600">
            <li>
                1. Customer Experience Management
            </li>
            <li>
                2. Revenue Generation Services
            </li>
            <li>
                3. Revenue Retention Services
            </li>
            <li>
                4. CX Technology Management Services
            </li>
            <li>
                5. Contact Centre Facility Services
            </li>
        </ol>
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        B. Business-Process-as-a-service (BPaaS):<br />
        <ol class="px-2 mt-1 text-sm text-gray-600">
            <li>
                1. Human Resource Management Services (HRMS)
            </li>
            <li>
                2. Payroll Management
            </li>
            <li>
                3. Services
            </li>
            <li>
                4. Training & Business Process Consultancy Services
            </li>
        </ol>
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        For 2024, we are focusing on services on AI, Automation and Data
        Science-as-a-Service.
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        For more information, please visit
        <a
            target="_blank"
            class="text-blue-500 hover:text-blue-700 hover:underline"
            href="https://syntra.tmone.com.my/syntra/bposervices/"
            >https://syntra.tmone.com.my/syntra/bposervices/</a
        >
    </p>

    <div class="flex justify-between mt-6">
        <a href="https://forms.gle/ah2nSHfVujhy487T6" target="_blank">
            <PrimaryButton> Quiz </PrimaryButton>
        </a>
        <SecondaryButton @click="close"> Close </SecondaryButton>
    </div>
</template>
