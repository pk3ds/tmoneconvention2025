<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    station: Object,
});

const form = useForm({
    name: props.station.name,
    type: props.station.type,
    description: props.station.description,
});

const items = ["product", "team building"];

const back = () => {
    window.history.back();
};
</script>

<template>
    <header class="flex justify-between">
        <div>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Station Information
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Edit existing station.
            </p>
        </div>
    </header>

    <form
        @submit.prevent="form.patch(route('stations.update', station))"
        class="mt-6 space-y-6"
    >
        <div>
            <InputLabel for="name" value="Name" />

            <TextInput
                id="name"
                type="text"
                class="block w-full mt-1"
                v-model="form.name"
                required
                autofocus
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div>
            <InputLabel for="type" value="Type" />
            <select
                required
                v-model="form.type"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
            >
                <option v-for="item in items" :value="item">
                    {{ item }}
                </option>
            </select>

            <InputError :message="form.errors.type" class="mt-2" />
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
