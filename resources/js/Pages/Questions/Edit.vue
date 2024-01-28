<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Details from "./Partials/Details.vue";
import Options from "./Partials/Options.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    types: Object,
    question: Object,
});

const form = useForm({
    name: props.question.name,
    question_type_id: props.question.question_type_id,
    option_one_id: props.question.options[0].id,
    option_one: props.question.options[0].name,
    option_one_correct: props.question.options[0].is_correct,
    option_two_id: props.question.options[1].id,
    option_two: props.question.options[1].name,
    option_two_correct: props.question.options[1].is_correct,
    option_three_id: props.question.options[2].id,
    option_three: props.question.options[2].name,
    option_three_correct: props.question.options[2].is_correct,
    option_four_id: props.question.options[3].id,
    option_four: props.question.options[3].name,
    option_four_correct: props.question.options[3].is_correct,
});

const back = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Edit Question" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('questions.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Questions
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Edit
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <h1 class="text-xl font-semibold leading-6 text-gray-900">
                        {{ question.name }}
                    </h1>
                    <div
                        class="flex justify-between mb-4 border-b border-gray-200"
                    >
                        <ul
                            class="flex flex-wrap -mb-px text-sm font-medium text-center"
                            id="default-tab"
                            data-tabs-toggle="#default-tab-content"
                            role="tablist"
                        >
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 capitalize border-b-2 rounded-t-lg"
                                    id="details-tab"
                                    data-tabs-target="#details"
                                    type="button"
                                    role="tab"
                                    aria-controls="details"
                                    aria-selected="false"
                                >
                                    details
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="options-tab"
                                    data-tabs-target="#options"
                                    type="button"
                                    role="tab"
                                    aria-controls="options"
                                    aria-selected="false"
                                >
                                    options
                                </button>
                            </li>
                        </ul>
                        <SecondaryButton class="px-4 my-2 me-2" @click="back">
                            Back
                        </SecondaryButton>
                    </div>
                    <div id="default-tab-content">
                        <div
                            class="hidden p-4 rounded-lg"
                            id="details"
                            role="tabpanel"
                            aria-labelledby="details-tab"
                        >
                            <Details
                                :form="form"
                                :station_id="station_id"
                                :stations="stations"
                                :types="types"
                                :question="question"
                            />
                        </div>
                        <div
                            class="hidden p-4 rounded-lg"
                            id="options"
                            role="tabpanel"
                            aria-labelledby="options-tab"
                        >
                            <Options :form="form" :question="question" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
