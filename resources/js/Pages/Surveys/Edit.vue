<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import QRCodeVue3 from "qrcode-vue3";

const props = defineProps({
    survey: Object,
});

const form = useForm({
    title: props.survey.title,
    description: props.survey.description,
    start_time: props.survey.start_time,
    end_time: props.survey.end_time,
    questions: props.survey.questions,
});

const addQuestion = () => {
    form.questions.push({
        question: "",
        type: "rating",
        order: form.questions.length + 1,
    });
};

const removeQuestion = (index) => {
    form.questions.splice(index, 1);
    form.questions.forEach((q, idx) => {
        q.order = idx + 1;
    });
};

const submit = () => {
    form.put(route("surveys.update", props.survey.id));
};
</script>

<template>
    <Head title="Edit Survey" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('surveys.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Surveys
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <span class="ml-4 text-sm font-medium text-gray-500">
                    Edit Survey
                </span>
            </BreadcrumbItem>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submit" class="space-y-6">
                            <div class="space-y-4">
                                <div>
                                    <InputLabel
                                        for="title"
                                        value="Survey Title"
                                    />
                                    <TextInput
                                        id="title"
                                        type="text"
                                        v-model="form.title"
                                        class="mt-1 block w-full"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.title"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="description"
                                        value="Description"
                                    />
                                    <textarea
                                        id="description"
                                        v-model="form.description"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        rows="3"
                                    ></textarea>
                                    <InputError
                                        :message="form.errors.description"
                                        class="mt-2"
                                    />
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <InputLabel
                                            for="start_time"
                                            value="Start Time"
                                        />
                                        <TextInput
                                            id="start_time"
                                            type="datetime-local"
                                            v-model="form.start_time"
                                            class="mt-1 block w-full"
                                            required
                                        />
                                        <InputError
                                            :message="form.errors.start_time"
                                            class="mt-2"
                                        />
                                    </div>

                                    <div>
                                        <InputLabel
                                            for="end_time"
                                            value="End Time"
                                        />
                                        <TextInput
                                            id="end_time"
                                            type="datetime-local"
                                            v-model="form.end_time"
                                            class="mt-1 block w-full"
                                            required
                                        />
                                        <InputError
                                            :message="form.errors.end_time"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Questions Section -->
                            <div class="space-y-6">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-medium">
                                        Questions
                                    </h3>
                                    <button
                                        type="button"
                                        @click="addQuestion"
                                        class="text-sm bg-gray-100 px-3 py-2 rounded-md hover:bg-gray-200"
                                    >
                                        Add Question
                                    </button>
                                </div>

                                <div
                                    v-for="(question, index) in form.questions"
                                    :key="index"
                                    class="p-4 border rounded-lg space-y-4"
                                >
                                    <div
                                        class="flex justify-between items-start"
                                    >
                                        <h4 class="font-medium">
                                            Question {{ index + 1 }}
                                        </h4>
                                        <button
                                            type="button"
                                            @click="removeQuestion(index)"
                                            class="text-red-600 hover:text-red-800"
                                            :disabled="
                                                form.questions.length === 1
                                            "
                                        >
                                            Remove
                                        </button>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <InputLabel
                                                :for="'question-' + index"
                                                value="Question Text"
                                            />
                                            <TextInput
                                                :id="'question-' + index"
                                                type="text"
                                                v-model="question.question"
                                                class="mt-1 block w-full"
                                                required
                                            />
                                            <InputError
                                                :message="
                                                    form.errors[
                                                        `questions.${index}.question`
                                                    ]
                                                "
                                                class="mt-2"
                                            />
                                        </div>

                                        <div>
                                            <InputLabel
                                                :for="'type-' + index"
                                                value="Question Type"
                                            />
                                            <select
                                                :id="'type-' + index"
                                                v-model="question.type"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                required
                                            >
                                                <option value="rating">
                                                    Rating (1-5)
                                                </option>
                                                <option value="text">
                                                    Text Response
                                                </option>
                                            </select>
                                            <InputError
                                                :message="
                                                    form.errors[
                                                        `questions.${index}.type`
                                                    ]
                                                "
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between gap-4">
                                <div class="flex gap-4">
                                    <Link :href="route('surveys.index')">
                                        <SecondaryButton type="button"
                                            >Cancel</SecondaryButton
                                        >
                                    </Link>
                                    <PrimaryButton :disabled="form.processing">
                                        Update Survey
                                    </PrimaryButton>
                                </div>
                                <PrimaryButton
                                    type="button"
                                    data-modal-target="qr-modal"
                                    data-modal-toggle="qr-modal"
                                >
                                    QR Code
                                </PrimaryButton>
                            </div>

                            <!-- Add QR Modal -->
                            <div
                                id="qr-modal"
                                tabindex="-1"
                                aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                            >
                                <div
                                    class="relative w-full max-w-md max-h-full p-4"
                                >
                                    <div
                                        class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                                    >
                                        <div
                                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600"
                                        >
                                            <h3
                                                class="text-xl font-semibold text-gray-900 dark:text-white"
                                            >
                                                Survey QR Code
                                            </h3>
                                            <button
                                                type="button"
                                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="qr-modal"
                                            >
                                                <svg
                                                    class="w-3 h-3"
                                                    aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 14 14"
                                                >
                                                    <path
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                                    />
                                                </svg>
                                                <span class="sr-only"
                                                    >Close modal</span
                                                >
                                            </button>
                                        </div>
                                        <div class="p-4 md:p-5">
                                            <QRCodeVue3
                                                :width="1000"
                                                :height="1000"
                                                :value="
                                                    route(
                                                        'surveys.show',
                                                        survey.uuid
                                                    )
                                                "
                                                :qrOptions="{
                                                    typeNumber: 0,
                                                    mode: 'Byte',
                                                    errorCorrectionLevel: 'H',
                                                }"
                                                image="/images/Wording-02.png"
                                                :imageOptions="{
                                                    hideBackgroundDots: true,
                                                    imageSize: 0.4,
                                                    margin: 0,
                                                }"
                                                :dotsOptions="{
                                                    type: 'rounded',
                                                    color: '#2362DD',
                                                    gradient: {
                                                        type: 'linear',
                                                        rotation: 90,
                                                        colorStops: [
                                                            {
                                                                offset: 0,
                                                                color: '#99B6FF',
                                                            },
                                                            {
                                                                offset: 1,
                                                                color: '#2362DD',
                                                            },
                                                        ],
                                                    },
                                                }"
                                                :backgroundOptions="{
                                                    color: '#ffffff',
                                                }"
                                                :cornersSquareOptions="{
                                                    type: 'extra-rounded',
                                                    color: '#2362DD',
                                                }"
                                                :cornersDotOptions="{
                                                    type: 'dot',
                                                    color: '#180092',
                                                }"
                                            />
                                        </div>
                                        <div
                                            class="flex items-center justify-center gap-4 p-4 md:p-5"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'surveys.show',
                                                        survey.uuid
                                                    )
                                                "
                                            >
                                                <PrimaryButton
                                                    data-modal-hide="qr-modal"
                                                >
                                                    Link
                                                </PrimaryButton>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
