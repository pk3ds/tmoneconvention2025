<script setup>
import { ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    survey: Object,
});

const page = usePage();
const form = ref({});
const submitting = ref(false);

const submit = () => {
    submitting.value = true;
    router.post(
        route("surveys.submit", props.survey.id),
        {
            answers: form.value,
        },
        {
            onFinish: () => (submitting.value = false),
        }
    );
};

const hasResponded = () => {
    return props.survey.responses?.some(
        (response) => response.user_id === page.props.auth.user.id
    );
};

const getUserResponse = () => {
    return props.survey.responses?.find(
        (response) => response.user_id === page.props.auth.user.id
    );
};

const getUserAnswer = (questionId, response) => {
    if (!response || !response.answers) return null;
    return response.answers.find(
        (answer) => answer.survey_question_id === questionId
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
                        <h2 class="text-2xl font-bold mb-6">
                            {{ survey.title }}
                        </h2>
                        <p class="text-gray-600 mb-6">
                            {{ survey.description }}
                        </p>

                        <!-- Show Survey Results if responded -->
                        <div v-if="hasResponded()" class="space-y-8">
                            <div
                                v-for="question in survey.questions"
                                :key="question.id"
                                class="p-6 border rounded-lg"
                            >
                                <h3 class="text-lg font-medium mb-4">
                                    {{ question.question }}
                                </h3>

                                <!-- Rating Type Answer Display -->
                                <div
                                    v-if="question.type === 'rating'"
                                    class="flex gap-4 mb-4"
                                >
                                    <div
                                        v-for="rating in 5"
                                        :key="rating"
                                        class="w-12 h-12 flex items-center justify-center rounded-lg"
                                        :class="{
                                            'bg-blue-100 border-blue-500 border-2':
                                                getUserAnswer(
                                                    question.id,
                                                    getUserResponse()
                                                )?.answer === rating.toString(),
                                            'bg-gray-100':
                                                getUserAnswer(
                                                    question.id,
                                                    getUserResponse()
                                                )?.answer !== rating.toString(),
                                        }"
                                    >
                                        {{ rating }}
                                    </div>
                                </div>

                                <!-- Text Type Answer Display -->
                                <div
                                    v-else
                                    class="bg-gray-50 p-4 rounded-lg whitespace-pre-wrap"
                                >
                                    {{
                                        getUserAnswer(
                                            question.id,
                                            getUserResponse()
                                        )?.answer
                                    }}
                                </div>
                            </div>

                            <!-- Show response summary -->
                            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                                <p class="font-medium">
                                    Thank you for your feedback!
                                </p>
                                <p class="mt-2">
                                    Points Earned:
                                    {{ getUserResponse().points_earned }}
                                </p>
                            </div>
                        </div>

                        <!-- Show Survey Form if not responded -->
                        <form v-else @submit.prevent="submit">
                            <div
                                v-for="question in survey.questions"
                                :key="question.id"
                                class="mb-8"
                            >
                                <h3 class="text-lg font-medium mb-4">
                                    {{ question.question }}
                                </h3>

                                <!-- Rating Type Input -->
                                <div
                                    v-if="question.type === 'rating'"
                                    class="space-y-3"
                                >
                                    <div class="flex gap-4">
                                        <button
                                            v-for="rating in 5"
                                            :key="rating"
                                            type="button"
                                            class="w-12 h-12 flex items-center justify-center rounded-lg border"
                                            :class="{
                                                'bg-blue-500 text-white border-blue-500':
                                                    form[question.id] ===
                                                    rating.toString(),
                                                'bg-white border-gray-300 hover:bg-gray-50':
                                                    form[question.id] !==
                                                    rating.toString(),
                                            }"
                                            @click="
                                                form[question.id] =
                                                    rating.toString()
                                            "
                                        >
                                            {{ rating }}
                                        </button>
                                    </div>
                                </div>

                                <!-- Text Type Input -->
                                <div v-else class="space-y-3">
                                    <textarea
                                        v-model="form[question.id]"
                                        rows="3"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <PrimaryButton :disabled="submitting">
                                    Submit Feedback
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
