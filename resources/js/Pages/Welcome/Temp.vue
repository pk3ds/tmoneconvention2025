<!-- resources/js/Pages/Welcome/Temp.vue -->
<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, router } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps({
    responses: {
        type: Object,
        default: () => ({
            physical: false,
            online: false,
        }),
    },
    auth: Object,
});

const attendanceType = ref("");

const hasResponded = computed(() => {
    return props.responses.physical || props.responses.online;
});

const responseType = computed(() => {
    if (props.responses.physical) return "physical";
    if (props.responses.online) return "online";
    return null;
});

const submit = () => {
    const surveyUrls = {
        physical: "/surveys/47087682-5f28-427f-8ae5-3b3914dc7e80",
        online: "/surveys/764d3ea3-d6b4-43ad-b475-762724c6e31e",
    };

    router.visit(surveyUrls[attendanceType.value]);
};

const viewResponse = () => {
    const surveyUrls = {
        physical: "/surveys/47087682-5f28-427f-8ae5-3b3914dc7e80",
        online: "/surveys/764d3ea3-d6b4-43ad-b475-762724c6e31e",
    };

    router.visit(surveyUrls[responseType.value]);
};
</script>

<template>
    <GuestLayout>
        <Head title="Welcome" />

        <div v-if="false" class="text-sm text-gray-600 mb-4">
            Please log in to continue.
        </div>

        <template v-else>
            <div v-if="hasResponded" class="mb-6">
                <div class="text-sm text-gray-600 mb-2">
                    You have already submitted your response for
                    <span class="font-medium">{{
                        responseType === "physical" ? "Physical" : "Online"
                    }}</span>
                    attendance.
                </div>
                <PrimaryButton @click="viewResponse">
                    View Your Response
                </PrimaryButton>
            </div>

            <form v-else @submit.prevent="submit">
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
        </template>
    </GuestLayout>
</template>
