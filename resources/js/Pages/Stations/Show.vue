<script setup>
import { ref } from "vue"; // Add this import
import { useForm, router } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    station: Object,
});

const form = ref({});
const submitting = ref(false);

const submit = (quiz) => {
    submitting.value = true;
    router.post(
        route("quizzes.submit", [props.station.id, quiz.id]),
        {
            answers: form.value,
        },
        {
            onFinish: () => (submitting.value = false),
        }
    );
};
</script>

<template>
    <AuthenticatedLayout>
        <div v-if="$page.props.errors.answers" class="text-red-600 mb-4">
            {{ $page.props.errors.answers }}
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div v-for="quiz in station.quizzes" :key="quiz.id">
                            <h2 class="text-2xl font-bold mb-6">
                                {{ quiz.name }}
                            </h2>

                            <form @submit.prevent="() => submit(quiz)">
                                <div
                                    v-for="questionLink in quiz.questions"
                                    :key="questionLink.id"
                                    class="mb-8"
                                >
                                    <h3 class="text-lg font-medium mb-4">
                                        {{ questionLink.question.name }}
                                    </h3>

                                    <div class="space-y-3">
                                        <label
                                            v-for="option in questionLink
                                                .question.options"
                                            :key="option.id"
                                            class="flex items-center p-3 border rounded hover:bg-gray-50"
                                        >
                                            <input
                                                type="radio"
                                                :name="
                                                    'question-' +
                                                    questionLink.question.id
                                                "
                                                :value="option.id"
                                                v-model="
                                                    form[
                                                        questionLink.question.id
                                                    ]
                                                "
                                                class="mr-3"
                                            />
                                            <span>{{ option.name }}</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <PrimaryButton :disabled="submitting">
                                        Submit Quiz
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
