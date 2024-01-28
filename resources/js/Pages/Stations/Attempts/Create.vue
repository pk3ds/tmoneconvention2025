<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    quiz: Object,
    questions: Object,
    question_options: Object,
});

const attempts = ref([]);

const save = (option, question, id) => {
    attempts.value.forEach((attempt, index) => {
        if (attempt.question_id == question) {
            attempts.value.splice(index, 1);
        }
    });
    attempts.value.push({
        quiz_question_id: id,
        question_id: question,
        option_id: option,
    });
};

const submit = () => {
    router.post(route("attempts.store", props.quiz), attempts.value);
};
</script>

<template>
    <Head :title="quiz.name" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('stations.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Stations
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link
                    :href="route('stations.show', quiz.station)"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Start
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Attempt
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto space-y-4 max-w-7xl sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div
                        v-for="question in questions"
                        class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="px-4 sm:px-6 lg:px-8">
                                {{ question.question?.name }}

                                <div class="mt-4 space-y-2">
                                    <div
                                        v-for="option in question.question
                                            ?.options"
                                        class="flex items-center border border-gray-200 rounded ps-4 dark:border-gray-700"
                                    >
                                        <input
                                            @click="
                                                save(
                                                    option.id,
                                                    question.question_id,
                                                    question.id
                                                )
                                            "
                                            :id="option.id"
                                            type="radio"
                                            :value="option.id"
                                            :name="question.question_id"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        />
                                        <label
                                            :for="option.id"
                                            class="w-full py-4 text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"
                                        >
                                            {{ option.name }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <PrimaryButton>Save</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
