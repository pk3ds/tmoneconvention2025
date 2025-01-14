<script setup>
import { ref } from "vue";
import { useForm, router, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    quiz: Object,
});

const page = usePage();
const form = ref({});
const submitting = ref(false);

// Initialize form with arrays for multiple choice questions
const initializeForm = () => {
    props.quiz.questions.forEach((questionLink) => {
        if (questionLink.question.question_type_id === 2) {
            form.value[questionLink.question.id] = [];
        } else {
            form.value[questionLink.question.id] = null;
        }
    });
};

// Call initialization when component is created
initializeForm();

const submit = () => {
    submitting.value = true;
    router.post(
        route("quizzes.submit", props.quiz.uuid),
        {
            answers: form.value,
        },
        {
            onFinish: () => (submitting.value = false),
        }
    );
};

const hasAttempted = () => {
    return props.quiz.attempts?.some(
        (attempt) => attempt.participant_id === page.props.auth.user.id
    );
};

const getUserAttempt = () => {
    return props.quiz.attempts?.find(
        (attempt) => attempt.participant_id === page.props.auth.user.id
    );
};

const getUserAnswers = (questionId, attempt) => {
    if (!attempt || !attempt.answers) return [];
    return attempt.answers.filter(
        (answer) => answer.quiz_question.question_id === questionId
    );
};

const isOptionSelected = (questionId, optionId, attempt) => {
    const answers = getUserAnswers(questionId, attempt);
    return answers.some((answer) => answer.question_option_id === optionId);
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
                        <h2 class="text-2xl font-bold mb-6">
                            {{ quiz.name }}
                        </h2>

                        <!-- Show Quiz Results if attempted -->
                        <div v-if="hasAttempted()" class="space-y-8">
                            <div
                                v-for="questionLink in quiz.questions"
                                :key="questionLink.id"
                                class="p-6 border rounded-lg"
                            >
                                <h3 class="text-lg font-medium mb-4">
                                    {{ questionLink.question.name }}
                                    <span
                                        v-if="
                                            questionLink.question
                                                .question_type_id === 2
                                        "
                                        class="text-sm text-gray-500 ml-2"
                                    >
                                        (Multiple answers allowed)
                                    </span>
                                </h3>

                                <div class="space-y-3">
                                    <div
                                        v-for="option in questionLink.question
                                            .options"
                                        :key="option.id"
                                        class="flex items-center p-3 border rounded"
                                        :class="{
                                            'bg-green-100': option.is_correct,
                                            'bg-red-100':
                                                !option.is_correct &&
                                                isOptionSelected(
                                                    questionLink.question_id,
                                                    option.id,
                                                    getUserAttempt()
                                                ),
                                        }"
                                    >
                                        <div class="flex items-center gap-3">
                                            <svg
                                                v-if="option.is_correct"
                                                class="w-5 h-5 text-green-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 13l4 4L19 7"
                                                ></path>
                                            </svg>

                                            <svg
                                                v-if="
                                                    !option.is_correct &&
                                                    isOptionSelected(
                                                        questionLink.question_id,
                                                        option.id,
                                                        getUserAttempt()
                                                    )
                                                "
                                                class="w-5 h-5 text-red-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"
                                                ></path>
                                            </svg>

                                            <span>{{ option.name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Show attempt results -->
                            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                                <!-- <p class="font-medium">
                                    Score:
                                    {{ getUserAttempt().marks_obtained }}
                                    / 100
                                </p> -->
                                <p>
                                    Correct Answers:
                                    {{ getUserAttempt().correct_answers }}
                                    / {{ getUserAttempt().total_questions }}
                                </p>
                                <p class="mt-2">
                                    Points Earned:
                                    {{ getUserAttempt().points_earned }}
                                </p>
                            </div>
                        </div>

                        <!-- Show Quiz Form if not attempted -->
                        <form v-else @submit.prevent="submit">
                            <div
                                v-for="questionLink in quiz.questions"
                                :key="questionLink.id"
                                class="mb-8"
                            >
                                <h3 class="text-lg font-medium mb-4">
                                    {{ questionLink.question.name }}
                                    <span
                                        v-if="
                                            questionLink.question
                                                .question_type_id === 2
                                        "
                                        class="text-sm text-gray-500 ml-2"
                                    >
                                        (Select all that apply)
                                    </span>
                                </h3>

                                <div class="space-y-3">
                                    <label
                                        v-for="option in questionLink.question
                                            .options"
                                        :key="option.id"
                                        class="flex items-center p-3 border rounded hover:bg-gray-50"
                                    >
                                        <input
                                            :type="
                                                questionLink.question
                                                    .question_type_id === 2
                                                    ? 'checkbox'
                                                    : 'radio'
                                            "
                                            :name="
                                                'question-' +
                                                questionLink.question.id
                                            "
                                            :value="option.id"
                                            v-model="
                                                form[questionLink.question.id]
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
    </AuthenticatedLayout>
</template>
