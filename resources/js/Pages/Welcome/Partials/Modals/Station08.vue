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
        PWRSTATION 08: Smart Education & Smart Agriculture: Digital School &
        Smart Farming
    </h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        TM Digital School:<br />
        <ol class="px-2 mt-1 text-sm text-gray-600">
            <li>
                1. Smart Cashless School
            </li>
            <li>
                2. Help the school with the provision of
        spending facilities, streamlining towards a more efficient financial
        management
            </li>
            <li>
                3. Streamlining Cashless Transactions, Attendance Tracking
        and Access to School-Related Services.
            </li>
        </ol>

    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        TM Digital School - Value Proposition: <br />
        <ol class="px-2 mt-1 text-sm text-gray-600">
            <li>
                1. Simple and easy to use - QR codes and cards
            </li>
            <li>
                2. Personalized, Fast,
        easy and secure
            </li>
        </ol>

    </p>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Smart Farming:<br />
        <ol class="px-2 mt-1 text-sm text-gray-600">
            <li>
                1. The Smart Automated Fertigation and Irrigation solution allows
        farmers to save time, resources, and effort by completing both
        fertilization and irrigation at the same time.
            </li>
            <li>
                2. Offering large and
        small-scale fertigation systems with fully automated control, it is
        suitable for farm enterprises of any size.
            </li>
            <li>
                3. This fertigation technique
        proves to be more efficient compared to traditional fertilisation
        methods as liquid fertilizers are delivered to plants with irrigation.
            </li>
        </ol>

    </p>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Smart Farming - Value Propostion:<br />
        <ol class="px-2 mt-1 text-sm text-gray-600">
            <li>
                1. Ready made & customizable solution
            </li>
            <li>
                2. Predictive Analytics to
        optimize the yield
            </li>
            <li>
                3. Co-created with the experience of in-house experts
        & partners
            </li>
        </ol>

    </p>

    <div class="flex justify-between mt-6">
        <a href="https://forms.gle/tc1Vfq235SA7vQC9A" target="_blank">
            <PrimaryButton> Quiz </PrimaryButton>
        </a>
        <SecondaryButton @click="close"> Close </SecondaryButton>
    </div>
</template>
