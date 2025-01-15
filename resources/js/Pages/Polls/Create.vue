//resources/js/Pages/Polls/Create.vue
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
    expires_at: "",
    options: ["", ""], // Changed to array of strings instead of objects
});

const submitting = ref(false);

const addOption = () => {
    form.value.options.push("");
};

const removeOption = (index) => {
    if (form.value.options.length > 2) {
        form.value.options.splice(index, 1);
    }
};

const submit = () => {
    submitting.value = true;
    router.post(route("polls.store"), form.value, {
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
                        <h2 class="text-2xl font-bold mb-6">Create New Poll</h2>

                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Poll Details -->
                            <div class="space-y-4">
                                <div>
                                    <InputLabel
                                        for="title"
                                        value="Poll Title"
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

                                <div>
                                    <InputLabel
                                        for="expires_at"
                                        value="Expiration Date (Optional)"
                                    />
                                    <TextInput
                                        id="expires_at"
                                        type="datetime-local"
                                        v-model="form.expires_at"
                                        class="mt-1 block w-full"
                                    />
                                    <InputError
                                        :message="$page.props.errors.expires_at"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <!-- Options Section -->
                            <div class="space-y-6">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-medium">
                                        Poll Options
                                    </h3>
                                    <button
                                        type="button"
                                        @click="addOption"
                                        class="text-sm bg-gray-100 px-3 py-2 rounded-md hover:bg-gray-200"
                                    >
                                        Add Option
                                    </button>
                                </div>

                                <div
                                    v-for="(option, index) in form.options"
                                    :key="index"
                                    class="p-4 border rounded-lg space-y-4"
                                >
                                    <div
                                        class="flex justify-between items-start"
                                    >
                                        <h4 class="font-medium">
                                            Option {{ index + 1 }}
                                        </h4>
                                        <button
                                            type="button"
                                            @click="removeOption(index)"
                                            class="text-red-600 hover:text-red-800"
                                            :disabled="form.options.length <= 2"
                                        >
                                            Remove
                                        </button>
                                    </div>

                                    <div>
                                        <InputLabel
                                            :for="'option-' + index"
                                            value="Option Text"
                                        />
                                        <TextInput
                                            :id="'option-' + index"
                                            type="text"
                                            v-model="form.options[index]"
                                            class="mt-1 block w-full"
                                            required
                                            :placeholder="
                                                'Enter option ' + (index + 1)
                                            "
                                        />
                                        <InputError
                                            :message="
                                                $page.props.errors[
                                                    `options.${index}`
                                                ]
                                            "
                                            class="mt-2"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <PrimaryButton :disabled="submitting">
                                    Create Poll
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
