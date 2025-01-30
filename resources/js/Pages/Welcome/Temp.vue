<!-- resources/js/Pages/Welcome/Temp.vue -->
<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, router } from "@inertiajs/vue3";
import { ref } from "vue";

const attendanceType = ref("");

const submit = () => {
    const surveyUrls = {
        physical: "/surveys/47087682-5f28-427f-8ae5-3b3914dc7e80",
        online: "/surveys/764d3ea3-d6b4-43ad-b475-762724c6e31e",
    };

    router.visit(surveyUrls[attendanceType.value]);
};
</script>

<template>
    <GuestLayout>
        <Head title="Welcome" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel value="Select Attendance Type" />

                <div class="mt-4 space-y-4">
                    <label class="flex items-center">
                        <input
                            id="physical"
                            v-model="attendanceType"
                            type="radio"
                            value="physical"
                            name="attendance"
                            class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                        />
                        <span
                            class="text-sm text-gray-600 ms-2 dark:text-gray-400"
                            >Physical Attendance</span
                        >
                    </label>

                    <label class="flex items-center">
                        <input
                            id="online"
                            v-model="attendanceType"
                            type="radio"
                            value="online"
                            name="attendance"
                            class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                        />
                        <span
                            class="text-sm text-gray-600 ms-2 dark:text-gray-400"
                            >Online Attendance</span
                        >
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': !attendanceType }"
                    :disabled="!attendanceType"
                >
                    Continue
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
