<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    form: Object,
    question: Object,
});
</script>

<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Question Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Edit existing question.
        </p>
    </header>

    <form
        @submit.prevent="form.patch(route('questions.update', question))"
        class="mt-6 space-y-4"
    >
        <div class="flex flex-col items-center justify-between sm:flex-row">
            <div class="w-auto md:w-3/4">
                <InputLabel for="option_one" value="Option One" />

                <TextInput
                    id="option_one"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.option_one"
                    required
                />

                <InputError :message="form.errors.option_one" class="mt-2" />
            </div>

            <label
                class="relative inline-flex items-center mt-6 cursor-pointer"
            >
                <input
                    type="checkbox"
                    v-model="form.option_one_correct"
                    class="sr-only peer"
                />
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                ></div>
                <span
                    class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300"
                    >Correct answer</span
                >
            </label>
        </div>

        <div class="flex flex-col items-center justify-between sm:flex-row">
            <div class="w-auto md:w-3/4">
                <InputLabel for="option_two" value="Option Two" />

                <TextInput
                    id="option_two"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.option_two"
                    required
                />

                <InputError :message="form.errors.option_two" class="mt-2" />
            </div>

            <label
                class="relative inline-flex items-center mt-6 cursor-pointer"
            >
                <input
                    type="checkbox"
                    v-model="form.option_two_correct"
                    class="sr-only peer"
                />
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                ></div>
                <span
                    class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300"
                    >Correct answer</span
                >
            </label>
        </div>

        <div class="flex flex-col items-center justify-between sm:flex-row">
            <div class="w-auto md:w-3/4">
                <InputLabel for="option_three" value="Option Three" />

                <TextInput
                    id="option_three"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.option_three"
                    required
                />

                <InputError :message="form.errors.option_three" class="mt-2" />
            </div>

            <label
                class="relative inline-flex items-center mt-6 cursor-pointer"
            >
                <input
                    type="checkbox"
                    v-model="form.option_three_correct"
                    class="sr-only peer"
                />
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                ></div>
                <span
                    class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300"
                    >Correct answer</span
                >
            </label>
        </div>

        <div class="flex flex-col items-center justify-between sm:flex-row">
            <div class="w-auto md:w-3/4">
                <InputLabel for="option_four" value="Option Four" />

                <TextInput
                    id="option_four"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.option_four"
                    required
                />

                <InputError :message="form.errors.option_four" class="mt-2" />
            </div>

            <label
                class="relative inline-flex items-center mt-6 cursor-pointer"
            >
                <input
                    type="checkbox"
                    v-model="form.option_four_correct"
                    class="sr-only peer"
                />
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                ></div>
                <span
                    class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300"
                    >Correct answer</span
                >
            </label>
        </div>

        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing" @click="submit"
                >Save</PrimaryButton
            >
        </div>
    </form>
</template>
