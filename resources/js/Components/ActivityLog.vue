<script setup>
defineProps({ activities: Object });

const formatDate = (date) => {
    return new Intl.DateTimeFormat("en-my", {
        dateStyle: "medium",
        timeStyle: "short",
        timeZone: "Asia/Kuala_Lumpur",
        hour12: false,
    }).format(new Date(date));
};
</script>

<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Activity Log
        </h2>
    </header>
    <ol class="relative mt-6 border-gray-200 border-s">
        <li v-for="activity in activities" class="mb-10 ms-4">
            <div
                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white"
            ></div>
            <div class="flex items-center justify-start gap-x-2">
                <time class="mb-1 text-sm font-normal leading-none">
                    {{ formatDate(activity.created_at) }}
                </time>
                <svg viewBox="0 0 2 2" class="w-1 h-1 mb-1" fill="currentColor">
                    <circle cx="1" cy="1" r="1" />
                </svg>
                <p class="mb-1 text-sm font-normal leading-none">
                    {{ activity.causer?.name }}
                </p>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 capitalize">
                {{ activity.description }}
            </h3>
            <div
                v-if="activity.properties.attributes"
                class="flex justify-start"
            >
                <table class="px-2 text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <td class="px-1 py-1">Key</td>
                            <td class="px-1 py-1">Value</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="[key, value] in Object.entries(
                                activity.properties.attributes
                            )"
                            class="bg-white border-b"
                        >
                            <td scope="col" class="px-1 py-1">
                                {{ key }}
                            </td>
                            <td scope="col" class="px-1 py-1">
                                {{ value }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                v-if="activity.properties.points"
                class="px-2 text-sm text-gray-500"
            >
                {{ activity.properties.points }}
                for
                {{ activity.event }}
            </div>
        </li>
    </ol>
</template>
