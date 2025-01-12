<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    userCheckpoints: {
        type: Array,
        default: () => [],
    },
});

const passport = Array.from({ length: 10 }, (_, index) => {
    // Updated length to 10
    const checkpointNumber = index + 1;
    return {
        imageUrl: `/images/PWRGame-${String(checkpointNumber).padStart(
            2,
            "0"
        )}.png`,
        isUnlocked: props.userCheckpoints.includes(checkpointNumber),
    };
});
</script>

<template>
    <Head title="Passport" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <li class="flex">
                <div class="flex items-center">
                    <svg
                        class="flex-shrink-0 w-6 h-full text-gray-100"
                        viewBox="0 0 24 44"
                        preserveAspectRatio="none"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                </div>
            </li>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="py-6 bg-white rounded-md">
                    <div class="px-6 mx-auto max-w-7xl lg:px-8">
                        <ul
                            role="list"
                            class="grid max-w-2xl grid-cols-1 mx-auto gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2"
                        >
                            <li v-for="(item, index) in passport" :key="index">
                                <img
                                    v-if="item.isUnlocked"
                                    class="object-cover w-full rounded-2xl drop-shadow-2xl"
                                    :src="item.imageUrl"
                                    :alt="`Checkpoint ${index + 1}`"
                                />
                                <div
                                    v-else
                                    class="flex items-center justify-center w-full bg-gray-200 rounded-2xl aspect-[3/2]"
                                >
                                    <svg
                                        class="w-12 h-12 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        />
                                    </svg>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
