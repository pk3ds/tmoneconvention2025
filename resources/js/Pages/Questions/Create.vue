<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    types: Object,
});

const form = useForm({
    name: "",
    question_type_id: "",
    option_one: "",
    option_one_correct: false,
    option_two: "",
    option_two_correct: false,
    option_three: "",
    option_three_correct: false,
    option_four: "",
    option_four_correct: false,
});

const back = () => {
    window.history.back();
};

const transform = (string) => {
    return string.replaceAll("_", " ");
};

const submit = () => {
    form.post(route("questions.store"));
};
</script>

<template>
    <Head title="Create Question" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('questions.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Question
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Create
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg"
                >
                    <section>
                        <header class="flex justify-between">
                            <div>
                                <h2
                                    class="text-lg font-medium text-gray-900 dark:text-gray-100"
                                >
                                    Question Information
                                </h2>

                                <p
                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                                >
                                    Create new question.
                                </p>
                            </div>

                            <SecondaryButton
                                class="px-4 my-2 me-2"
                                @click="back"
                            >
                                Back
                            </SecondaryButton>
                        </header>

                        <form class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.name"
                                    required
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="question_type_id"
                                    value="Question Type"
                                />
                                <select
                                    required
                                    v-model="form.question_type_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                >
                                    <option
                                        v-for="item in types"
                                        :value="item.id"
                                    >
                                        {{ transform(item.name) }}
                                    </option>
                                </select>

                                <InputError
                                    :message="form.errors.question_type_id"
                                    class="mt-2"
                                />
                            </div>
                        </form>
                    </section>
                </div>

                <div
                    class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg"
                >
                    <section>
                        <form class="mt-6 space-y-4">
                            <div
                                class="flex flex-col items-center justify-between sm:flex-row"
                            >
                                <div class="w-auto md:w-3/4">
                                    <InputLabel
                                        for="option_one"
                                        value="Option One"
                                    />

                                    <TextInput
                                        id="option_one"
                                        type="text"
                                        class="block w-full mt-1"
                                        v-model="form.option_one"
                                        required
                                    />

                                    <InputError
                                        :message="form.errors.option_one"
                                        class="mt-2"
                                    />
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

                            <div
                                class="flex flex-col items-center justify-between sm:flex-row"
                            >
                                <div class="w-auto md:w-3/4">
                                    <InputLabel
                                        for="option_two"
                                        value="Option Two"
                                    />

                                    <TextInput
                                        id="option_two"
                                        type="text"
                                        class="block w-full mt-1"
                                        v-model="form.option_two"
                                        required
                                    />

                                    <InputError
                                        :message="form.errors.option_two"
                                        class="mt-2"
                                    />
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

                            <div
                                class="flex flex-col items-center justify-between sm:flex-row"
                            >
                                <div class="w-auto md:w-3/4">
                                    <InputLabel
                                        for="option_three"
                                        value="Option Three"
                                    />

                                    <TextInput
                                        id="option_three"
                                        type="text"
                                        class="block w-full mt-1"
                                        v-model="form.option_three"
                                        required
                                    />

                                    <InputError
                                        :message="form.errors.option_three"
                                        class="mt-2"
                                    />
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

                            <div
                                class="flex flex-col items-center justify-between sm:flex-row"
                            >
                                <div class="w-auto md:w-3/4">
                                    <InputLabel
                                        for="option_four"
                                        value="Option Four"
                                    />

                                    <TextInput
                                        id="option_four"
                                        type="text"
                                        class="block w-full mt-1"
                                        v-model="form.option_four"
                                        required
                                    />

                                    <InputError
                                        :message="form.errors.option_four"
                                        class="mt-2"
                                    />
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
                                <PrimaryButton
                                    :disabled="form.processing"
                                    @click="submit"
                                    >Save</PrimaryButton
                                >
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
