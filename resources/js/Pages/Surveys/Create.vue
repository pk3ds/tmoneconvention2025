<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

const form = ref({
    title: "",
    description: "",
    start_time: "",
    end_time: "",
    questions: [
        {
            question: "",
            type: "rating",
            order: 1,
        },
    ],
});

const submitting = ref(false);

const addQuestion = () => {
    form.value.questions.push({
        question: "",
        type: "rating",
        order: form.value.questions.length + 1,
    });
};

const removeQuestion = (index) => {
    form.value.questions.splice(index, 1);
    // Update order for remaining questions
    form.value.questions.forEach((q, idx) => {
        q.order = idx + 1;
    });
};

const submit = () => {
    submitting.value = true;
    router.post(route("surveys.store"), form.value, {
        onFinish: () => (submitting.value = false),
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-6">
                            Create New Survey
                        </h2>

                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Survey Details -->
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
                                        :message="$page.props.errors.title"
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
                                        :message="
                                            $page.props.errors.description
                                        "
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
                                            :message="
                                                $page.props.errors.start_time
                                            "
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
                                            :message="
                                                $page.props.errors.end_time
                                            "
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <PrimaryButton :disabled="submitting">
                                    Create Survey
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
