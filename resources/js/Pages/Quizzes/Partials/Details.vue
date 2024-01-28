<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    quiz: Object,
    stations: Object,
    station_id: Number,
});

const form = useForm({
    station_id: props.station_id ?? props.quiz.station_id,
    name: props.quiz.name,
    description: props.quiz.description,
});
</script>

<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Quiz Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Edit existing quiz.
        </p>
    </header>

    <form
        @submit.prevent="form.patch(route('quizzes.update', quiz))"
        class="mt-6 space-y-6"
    >
        <div v-show="!station_id">
            <InputLabel for="station_id" value="Station" />
            <select
                required
                v-model="form.station_id"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
            >
                <option v-for="station in stations" :value="station.id">
                    {{ station.name }}
                </option>
            </select>

            <InputError :message="form.errors.station_id" class="mt-2" />
        </div>

        <div>
            <InputLabel for="name" value="Name" />

            <TextInput
                id="name"
                type="text"
                class="block w-full mt-1"
                v-model="form.name"
                required
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div>
            <InputLabel for="description" value="Description (optional)" />

            <TextInput
                id="description"
                type="text"
                class="block w-full mt-1"
                v-model="form.description"
            />

            <InputError class="mt-2" :message="form.errors.description" />
        </div>

        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
        </div>
    </form>
</template>
