//resources/js/Pages/Polls/Show.vue
<script setup>
import { ref } from "vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    poll: {
        type: Object,
        required: true,
    },
});

const page = usePage();
const selectedOption = ref(null);
const submitting = ref(false);

const hasVoted = () => {
    return (
        props.poll.votes?.some(
            (vote) => vote.user_id === page.props.auth.user.id
        ) ?? false
    );
};

const calculatePercentage = (optionVotes) => {
    const totalVotes = props.poll.votes?.length || 0;
    if (totalVotes === 0) return 0;
    return Math.round((optionVotes / totalVotes) * 100);
};

const getVoteCount = (optionId) => {
    return (
        props.poll.votes?.filter((vote) => vote.poll_option_id === optionId)
            .length || 0
    );
};

const getVotersByOption = (optionId) => {
    return (
        props.poll.votes?.filter((vote) => vote.poll_option_id === optionId) ||
        []
    );
};

const submitVote = () => {
    if (!selectedOption.value) return;

    submitting.value = true;
    router.post(
        route("polls.vote", props.poll.id),
        {
            option_id: selectedOption.value,
        },
        {
            onFinish: () => {
                submitting.value = false;
            },
        }
    );
};
</script>

<template>
    <Head :title="poll.title" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <!-- Poll Header -->
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-gray-900">
                                {{ poll.title }}
                            </h1>
                            <p
                                v-if="poll.description"
                                class="mt-2 text-gray-600"
                            >
                                {{ poll.description }}
                            </p>
                            <p
                                v-if="poll.expires_at"
                                class="mt-2 text-sm text-gray-500"
                            >
                                Expires:
                                {{ new Date(poll.expires_at).toLocaleString() }}
                            </p>
                        </div>

                        <!-- Results View -->
                        <div v-if="hasVoted()" class="space-y-4">
                            <h2 class="text-lg font-semibold mb-4">Results</h2>
                            <div
                                v-for="option in poll.options"
                                :key="option.id"
                                class="space-y-2"
                            >
                                <div
                                    class="flex justify-between text-sm text-gray-600"
                                >
                                    <span>{{ option.option_text }}</span>
                                    <span>
                                        {{
                                            calculatePercentage(
                                                getVoteCount(option.id)
                                            )
                                        }}%
                                    </span>
                                </div>
                                <div
                                    class="relative w-full h-4 bg-gray-200 rounded-full overflow-hidden"
                                >
                                    <div
                                        class="absolute top-0 left-0 h-full bg-blue-600 transition-all duration-500"
                                        :style="{
                                            width:
                                                calculatePercentage(
                                                    getVoteCount(option.id)
                                                ) + '%',
                                        }"
                                    ></div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm text-gray-500">
                                        {{ getVoteCount(option.id) }} votes
                                    </p>
                                </div>

                                <!-- Voter List - Only visible to users with manage surveys permission -->
                                <div
                                    v-if="
                                        $page.props.permissions.includes(
                                            'manage surveys'
                                        )
                                    "
                                    class="mt-2"
                                >
                                    <div
                                        v-if="
                                            getVotersByOption(option.id)
                                                .length > 0
                                        "
                                        class="pl-4 border-l-2 border-gray-200"
                                    >
                                        <p
                                            class="text-sm font-medium text-gray-700 mb-1"
                                        >
                                            Voters:
                                        </p>
                                        <ul class="space-y-1">
                                            <li
                                                v-for="vote in getVotersByOption(
                                                    option.id
                                                )"
                                                :key="vote.id"
                                                class="text-sm text-gray-600 flex items-center space-x-2"
                                            >
                                                <span>{{
                                                    vote.user.name
                                                }}</span>
                                                <span class="text-gray-400"
                                                    >|</span
                                                >
                                                <span class="text-gray-400">{{
                                                    vote.user.staff_id
                                                }}</span>
                                                <!-- <span class="text-gray-400"
                                                    >|</span
                                                >
                                                <span class="text-gray-400">
                                                    {{
                                                        new Date(
                                                            vote.created_at
                                                        ).toLocaleString()
                                                    }}
                                                </span> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-600">
                                Total votes: {{ poll.votes?.length || 0 }}
                            </div>
                        </div>

                        <!-- Voting Form -->
                        <form
                            v-else
                            @submit.prevent="submitVote"
                            class="space-y-4"
                        >
                            <h2 class="text-lg font-semibold mb-4">
                                Cast Your Vote
                            </h2>
                            <div class="space-y-3">
                                <div
                                    v-for="option in poll.options"
                                    :key="option.id"
                                >
                                    <label
                                        class="flex items-center space-x-3 p-3 border rounded-lg cursor-pointer hover:bg-gray-50"
                                    >
                                        <input
                                            type="radio"
                                            :value="option.id"
                                            v-model="selectedOption"
                                            name="poll_option"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                        />
                                        <span class="text-gray-900">
                                            {{ option.option_text }}
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <PrimaryButton
                                    :disabled="!selectedOption || submitting"
                                >
                                    Submit Vote
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
