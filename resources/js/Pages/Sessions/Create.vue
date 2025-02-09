<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    description: "",
    start_at: "",
    end_at: "",
    isCheckpoint: false,
    checkpointNo: "",
});

const back = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Create Session" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('sessions.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Sessions
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
                                    Session Information
                                </h2>

                                <p
                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                                >
                                    Create new session.
                                </p>
                            </div>
                            <SecondaryButton
                                class="px-4 my-2 me-2"
                                @click="back"
                            >
                                Back
                            </SecondaryButton>
                        </header>

                        <form
                            @submit.prevent="form.post(route('sessions.store'))"
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

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="description"
                                    value="Description"
                                />

                                <TextInput
                                    id="description"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.description"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.description"
                                />
                            </div>

                            <div>
                                <InputLabel for="start_at" value="Start Date" />

                                <TextInput
                                    id="start_at"
                                    type="datetime-local"
                                    class="block w-full mt-1"
                                    v-model="form.start_at"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.start_at"
                                />
                            </div>

                            <div>
                                <InputLabel for="end_at" value="End Date" />

                                <TextInput
                                    id="end_at"
                                    type="datetime-local"
                                    class="block w-full mt-1"
                                    v-model="form.end_at"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.end_at"
                                />
                            </div>

                            <div>
                                <div class="flex items-center mt-4">
                                    <input
                                        id="isCheckpoint"
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                        v-model="form.isCheckpoint"
                                    />
                                    <label
                                        for="isCheckpoint"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Is Checkpoints
                                    </label>
                                </div>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.isCheckpoint"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="checkpointNo"
                                    value="Checkpoint Number"
                                />

                                <TextInput
                                    id="checkpointNo"
                                    type="number"
                                    class="block w-full mt-1"
                                    v-model="form.checkpointNo"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.checkpointNo"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
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
