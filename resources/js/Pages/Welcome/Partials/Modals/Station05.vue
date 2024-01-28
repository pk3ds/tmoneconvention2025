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
        PWRSTATION 05: Innolab
    </h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Innovation Lab:</p>
    <ol class="px-2 mt-1 text-sm text-gray-600">
        <li>
            1. A collaborative space for innovation, creativity and
            experimentation of ideas.
        </li>
        <li>
            2. Co-create with partners and customers to accelerate the
            development of innovative products & services.
        </li>
        <li>3. Encouraging a culture of continuous learning and iteration</li>
        <li>
            4. Modular lab space to cater for various technology display,
            development and testing, equipped with private & public 5G and other
            up-to-date facilities
        </li>
    </ol>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Value Proposition:
    </p>
    <ol class="px-2 mt-1 text-sm text-gray-600">
        <li>
            1. LIVE Sandbox for customer to explore, experience, test and
            validate solutions and technology prior to actual site deployment
        </li>
        <li>
            2. A single place to influence customers to experience all solutions
            by TM One and partners
        </li>
        <li>
            3. Co-create with partners & customers to venture into practical &
            future proof technology
        </li>
    </ol>

    <div class="flex justify-between mt-6">
        <a href="https://forms.gle/pwEnUYXmCcYsvHJ79" target="_blank">
            <PrimaryButton> Quiz </PrimaryButton>
        </a>
        <SecondaryButton @click="close"> Close </SecondaryButton>
    </div>
</template>
