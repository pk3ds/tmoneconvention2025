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
    <div
        id="accordion-flush"
        data-accordion="collapse"
        data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
        data-inactive-classes="text-gray-500 dark:text-gray-400"
    >
        <h2 id="accordion-flush-heading-1">
            <button
                type="button"
                class="flex items-center justify-end w-full gap-3 py-2 font-medium text-right text-gray-500"
                data-accordion-target="#accordion-flush-body-1"
                aria-expanded="true"
                aria-controls="accordion-flush-body-1"
            >
                <span>Activity Log</span>
                <svg
                    data-accordion-icon
                    class="w-3 h-3 rotate-180 shrink-0"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5 5 1 1 5"
                    />
                </svg>
            </button>
        </h2>
        <div
            id="accordion-flush-body-1"
            class="hidden"
            aria-labelledby="accordion-flush-heading-1"
        >
            <div class="py-2">
                <ol class="relative mt-6 border-gray-200 border-e">
                    <li v-for="activity in activities" class="mb-10 me-4">
                        <div
                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -end-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"
                        ></div>
                        <div class="flex items-center justify-end gap-x-2">
                            <time
                                class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"
                            >
                                {{ formatDate(activity.created_at) }}
                            </time>
                            <svg
                                viewBox="0 0 2 2"
                                class="w-1 h-1 mb-1"
                                fill="currentColor"
                            >
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p
                                class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"
                            >
                                {{ activity.causer?.name }}
                            </p>
                        </div>
                        <h3
                            class="text-lg font-semibold text-gray-900 capitalize dark:text-white"
                        >
                            {{ activity.description }}
                        </h3>
                        <div
                            v-if="activity.properties.attributes"
                            class="flex justify-end"
                        >
                            <table class="px-2 text-sm text-left text-gray-500">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50"
                                >
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
                            class="px-2 text-sm text-right text-gray-500"
                        >
                            {{ activity.properties.points }}
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</template>
