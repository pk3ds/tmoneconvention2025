<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    station: Object,
});
</script>

<template>
    <header>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h2
                    class="text-lg font-medium text-gray-900 dark:text-gray-100"
                >
                    Quizzes Information
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    View station quizzes collection.
                </p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <Link :href="route('quizzes.create')">
                    <PrimaryButton> Add quiz </PrimaryButton>
                </Link>
            </div>
        </div>
    </header>

    <div class="mt-8 -mx-4 sm:-mx-0">
        <h1
            class="text-base leading-6 text-gray-900"
            v-if="station.quizzes?.length <= 0"
        >
            No quizzes to display
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
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                        Options
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="quiz in station.quizzes">
                    <td
                        class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                    >
                        <span class="flex gap-2">
                            {{ quiz.name }}
                        </span>
                        <dl class="font-normal lg:hidden"></dl>
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        {{ quiz.options?.length }}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        <div
                            class="flex flex-col justify-end gap-4 gap-y-2 md:flex-row"
                        >
                            <Link
                                v-if="!quiz.deleted_at"
                                :href="route('quizzes.edit', quiz)"
                            >
                                <PrimaryButton>
                                    <svg
                                        class="w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                        />
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
