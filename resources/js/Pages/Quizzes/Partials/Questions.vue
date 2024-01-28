<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    quiz: Object,
    questions: Object,
});

const unlink = (question) => {
    router.patch(route("quizzes.unlink", props.quiz), {
        id: question.id,
    });
};

const link = (question) => {
    router.patch(route("quizzes.link", props.quiz), {
        question_id: question.id,
    });
};
</script>

<template>
    <header class="flex justify-between">
        <div>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Questions List
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                View questions linked to the quiz.
            </p>
        </div>
    </header>

    <div class="mt-8 -mx-4 sm:-mx-0">
        <h1
            class="text-base leading-6 text-gray-900"
            v-if="quiz.questions?.length <= 0"
        >
            No questions to display
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
                        Station
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="question in quiz.questions">
                    <td
                        class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                    >
                        <span class="flex gap-2">
                            {{ question.question?.name }}

                            <svg
                                v-if="question.deleted_at"
                                class="w-3.5 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                fill="currentColor"
                            >
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                />
                            </svg>
                        </span>
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        {{ question.question?.station?.name }}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        <div
                            class="flex flex-col justify-end gap-4 gap-y-2 md:flex-row"
                        >
                            <span
                                v-if="!question.deleted_at"
                                @click="unlink(question)"
                            >
                                <SecondaryButton
                                    class="text-red-700 hover:text-red-500"
                                >
                                    <svg
                                        class="w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 512"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L489.3 358.2l90.5-90.5c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114l-96 96-31.9-25C430.9 239.6 420.1 175.1 377 132c-52.2-52.3-134.5-56.2-191.3-11.7L38.8 5.1zM239 162c30.1-14.9 67.7-9.9 92.8 15.3c20 20 27.5 48.3 21.7 74.5L239 162zM116.6 187.9L60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5l61.8-61.8-50.6-39.9zM220.9 270c-2.1 39.8 12.2 80.1 42.2 110c38.9 38.9 94.4 51 143.6 36.3L220.9 270z"
                                        />
                                    </svg>
                                </SecondaryButton>
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700" />

    <header class="flex justify-between">
        <div>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Questions Bank
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                View questions available to you.
            </p>
        </div>
    </header>

    <div class="mt-8 -mx-4 sm:-mx-0">
        <h1
            class="text-base leading-6 text-gray-900"
            v-if="questions.length <= 0"
        >
            No questions to display
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
                        Station
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="question in questions">
                    <td
                        class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                    >
                        <span class="flex gap-2">
                            {{ question.name }}

                            <svg
                                v-if="question.deleted_at"
                                class="w-3.5 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                fill="currentColor"
                            >
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                />
                            </svg>
                        </span>
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        {{ question.station?.name }}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        <div
                            class="flex flex-col justify-end gap-4 gap-y-2 md:flex-row"
                        >
                            <span
                                v-if="!question.deleted_at"
                                @click="link(question)"
                            >
                                <PrimaryButton>
                                    <svg
                                        class="w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 512"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"
                                        />
                                    </svg>
                                </PrimaryButton>
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
