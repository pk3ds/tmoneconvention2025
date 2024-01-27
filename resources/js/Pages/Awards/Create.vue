<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import NumberInput from "@/Components/NumberInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    types: Object,
    groups: Object,
    users: Object,
});

const form = useForm({
    name: "",
    remarks: "",
    points: "",
    awardable_type: "",
    awardable_id: "",
});

const recipients = ref([]);

const loadRecipients = () => {
    switch (form.awardable_type) {
        case "App\\Models\\Group": {
            recipients.value = props.groups;
            break;
        }
        case "App\\Models\\User": {
            recipients.value = props.users;
            break;
        }
    }
};

const back = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Create Award" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('awards.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Awards
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
                                    Award Information
                                </h2>

                                <p
                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                                >
                                    Create new award.
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
                            @submit.prevent="form.post(route('awards.store'))"
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
                                    for="remark"
                                    value="Remarks (optional)"
                                />

                                <TextInput
                                    id="remark"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.remark"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.remark"
                                />
                            </div>

                            <div>
                                <InputLabel for="points" value="Points" />

                                <NumberInput
                                    id="points"
                                    type="number"
                                    class="block w-full mt-1"
                                    v-model="form.points"
                                    required
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.points"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="awardable_type"
                                    value="Recipient Type"
                                />
                                <select
                                    required
                                    @change="loadRecipients"
                                    v-model="form.awardable_type"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                >
                                    <option v-for="item in types">
                                        {{ item }}
                                    </option>
                                </select>

                                <InputError
                                    :message="form.errors.awardable_type"
                                    class="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="awardable_id"
                                    value="Recipient"
                                />
                                <select
                                    required
                                    v-model="form.awardable_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                >
                                    <option
                                        v-for="item in recipients"
                                        :value="item.id"
                                    >
                                        {{ item.name }}
                                    </option>
                                </select>

                                <InputError
                                    :message="form.errors.awardable_id"
                                    class="mt-2"
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
