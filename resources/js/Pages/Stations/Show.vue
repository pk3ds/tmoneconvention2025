<script setup>
import { ref, computed } from "vue";
import { useForm, router, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    station: Object,
});

const page = usePage();
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

const hasAttempted = (quiz) => {
    return quiz.attempts?.some(
        (attempt) => attempt.participant_id === page.props.auth.user.id
    );
};

const getUserAttempt = (quiz) => {
    return quiz.attempts?.find(
        (attempt) => attempt.participant_id === page.props.auth.user.id
    );
};

const getUserAnswer = (questionId, attempt) => {
    if (!attempt || !attempt.answers) return null;

    return attempt.answers.find(
        (answer) => answer.quiz_question.question_id === questionId
    );
};

// Add this debug function to help troubleshoot
const debug = (questionLink, attempt) => {
    console.log("Question Link:", questionLink);
    console.log("Attempt:", attempt);
    if (attempt) {
        console.log("Attempt Answers:", attempt.answers);
    }
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

                            <!-- Show Quiz Results if attempted -->
                            <div v-if="hasAttempted(quiz)" class="space-y-8">
                                <div
                                    v-for="questionLink in quiz.questions"
                                    :key="questionLink.id"
                                    class="p-6 border rounded-lg"
                                >
                                    <h3 class="text-lg font-medium mb-4">
                                        {{ questionLink.question.name }}
                                    </h3>

                                    <div class="space-y-3">
                                        <div
                                            v-for="option in questionLink
                                                .question.options"
                                            :key="option.id"
                                            class="flex items-center p-3 border rounded"
                                            :class="{
                                                'bg-green-100':
                                                    option.is_correct,
                                                'bg-red-100':
                                                    !option.is_correct &&
                                                    getUserAnswer(
                                                        questionLink.question_id, // Changed this line
                                                        getUserAttempt(quiz)
                                                    )?.question_option_id ===
                                                        option.id,
                                            }"
                                        >
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <!-- Correct Answer Icon -->
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

                                                <!-- User's Wrong Answer Icon -->
                                                <svg
                                                    v-if="
                                                        !option.is_correct &&
                                                        getUserAnswer(
                                                            questionLink.question_id,
                                                            getUserAttempt(quiz)
                                                        )
                                                            ?.question_option_id ===
                                                            option.id
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
                                    <p class="font-medium">
                                        Score:
                                        {{
                                            getUserAttempt(quiz).marks_obtained
                                        }}
                                        / {{ quiz.total_marks }}
                                    </p>
                                    <p>
                                        Correct Answers:
                                        {{
                                            getUserAttempt(quiz).correct_answers
                                        }}
                                        /
                                        {{
                                            getUserAttempt(quiz).total_questions
                                        }}
                                    </p>
                                    <p
                                        v-if="getUserAttempt(quiz).is_passed"
                                        class="text-green-600"
                                    >
                                        Passed! 🎉
                                    </p>
                                    <p v-else class="text-red-600">
                                        Not passed. Keep practicing!
                                    </p>
                                </div>
                            </div>

                            <!-- Show Quiz Form if not attempted -->
                            <form v-else @submit.prevent="() => submit(quiz)">
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
