<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    group: Object,
});
</script>

<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Awards Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            View group awards collection.
        </p>
    </header>

    <div class="mt-8 -mx-4 sm:-mx-0">
        <h1
            class="text-base leading-6 text-gray-900"
            v-if="group.awards.length <= 0"
        >
            No awards to display
        </h1>
        <table v-else class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th
                        scope="col"
                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                    >
                        Name
                    </th>
                    <th
                        scope="col"
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                    >
                        Remarks
                    </th>
                    <th
                        scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                        Points
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="award in group.awards">
                    <td
                        class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                    >
                        <span class="flex gap-2">
                            {{ award.name }}
                        </span>
                        <dl class="font-normal lg:hidden">
                            <dt class="sr-only">Remarks</dt>
                            <dd class="mt-1 text-gray-700 truncate">
                                {{ award.remarks }}
                            </dd>
                        </dl>
                    </td>
                    <td
                        class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
                    >
                        {{ award.remarks }}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        {{ award.points }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
