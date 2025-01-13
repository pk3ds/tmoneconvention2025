<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import { Head, Link, useForm, router, usePage } from "@inertiajs/vue3";

const props = defineProps({
    search: String,
    surveys: Object,
});

const page = usePage();

const form = useForm({
    search: props.search ?? null,
});

const search = () => {
    router.get(route("surveys.index", { search: form.search }));
};

const destroy = (survey) => {
    router.delete(route("surveys.destroy", survey));
};

const restore = (id) => {
    router.put(route("surveys.restore", id));
};

const hasResponded = (survey) => {
    return (
        survey.responses?.some(
            (response) => response.user_id === page.props.auth.user.id
        ) ?? false
    );
};
</script>

<template>
    <Head title="Surveys" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Surveys
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Search Form -->
                <form class="mb-6" @submit.prevent="search">
                    <label for="default-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 start-0 flex items-center ps-3"
                        >
                            <svg
                                class="w-4 h-4 text-gray-500"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                                />
                            </svg>
                        </div>
                        <input
                            type="search"
                            id="default-search"
                            v-model="form.search"
                            class="block w-full p-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg ps-10 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search surveys..."
                        />
                        <button
                            class="text-white absolute end-2.5 bottom-2.5 bg-cobalt-blue hover:bg-ultramarine focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"
                        >
                            Search
                        </button>
                    </div>
                </form>

                <div class="bg-white shadow-sm rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1
                                    class="text-base font-semibold text-gray-900"
                                >
                                    Event Feedback Surveys
                                </h1>
                                <!-- <p class="mt-2 text-sm text-gray-700">
                                    A list of all surveys in the system
                                    including feedback questions.
                                </p> -->
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0">
                                <Link
                                    :href="route('surveys.create')"
                                    v-if="
                                        $page.props.permissions.includes(
                                            'manage surveys'
                                        )
                                    "
                                >
                                    <PrimaryButton> Add survey </PrimaryButton>
                                </Link>
                            </div>
                        </div>

                        <!-- Mobile-friendly Survey List -->
                        <div class="mt-8">
                            <h1
                                v-if="surveys.length <= 0"
                                class="text-base text-gray-900"
                            >
                                No surveys to display
                            </h1>
                            <div v-else class="space-y-4">
                                <!-- Survey Card for Mobile -->
                                <div
                                    v-for="survey in surveys"
                                    :key="survey.id"
                                    class="bg-white border rounded-lg shadow-sm p-4"
                                >
                                    <div
                                        class="flex items-start justify-between"
                                    >
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <h3
                                                    class="text-sm font-medium text-gray-900 break-words"
                                                >
                                                    {{ survey.title }}
                                                </h3>
                                                <svg
                                                    v-if="survey.deleted_at"
                                                    class="w-3.5 text-gray-400 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                                    />
                                                </svg>
                                            </div>
                                            <p
                                                class="mt-1 text-sm text-gray-600 break-words"
                                            >
                                                {{ survey.description }}
                                            </p>
                                            <div
                                                class="mt-2 flex flex-col text-sm text-gray-500"
                                            >
                                                <span
                                                    >Questions:
                                                    {{
                                                        survey.questions.length
                                                    }}</span
                                                >
                                                <!-- <span class="mt-1">
                                                    {{
                                                        new Date(
                                                            survey.start_time
                                                        ).toLocaleString()
                                                    }}
                                                    -
                                                    {{
                                                        new Date(
                                                            survey.end_time
                                                        ).toLocaleString()
                                                    }}
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <Link
                                            v-if="
                                                !survey.deleted_at &&
                                                $page.props.permissions.includes(
                                                    'manage surveys'
                                                )
                                            "
                                            :href="
                                                route('surveys.edit', survey)
                                            "
                                        >
                                            <PrimaryButton>
                                                <svg
                                                    class="w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                                    />
                                                </svg>
                                            </PrimaryButton>
                                        </Link>

                                        <span
                                            v-if="
                                                !survey.deleted_at &&
                                                $page.props.permissions.includes(
                                                    'manage surveys'
                                                )
                                            "
                                            @click="destroy(survey)"
                                        >
                                            <SecondaryButton
                                                class="text-red-700 hover:text-red-500"
                                            >
                                                <svg
                                                    class="w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                                    />
                                                </svg>
                                            </SecondaryButton>
                                        </span>

                                        <span
                                            v-if="
                                                survey.deleted_at &&
                                                $page.props.permissions.includes(
                                                    'manage surveys'
                                                )
                                            "
                                            @click="restore(survey.id)"
                                        >
                                            <SecondaryButton
                                                class="text-green-600 hover:text-green-500"
                                            >
                                                <svg
                                                    class="w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M174.7 45.1C192.2 17 223 0 256 0s63.8 17 81.3 45.1l38.6 61.7 27-15.6c8.4-4.9 18.9-4.2 26.6 1.7s11.1 15.9 8.6 25.3l-23.4 87.4c-3.4 12.8-16.6 20.4-29.4 17l-87.4-23.4c-9.4-2.5-16.3-10.4-17.6-20s3.4-19.1 11.8-23.9l28.4-16.4L283 79c-5.8-9.3-16-15-27-15s-21.2 5.7-27 15l-17.5 28c-9.2 14.8-28.6 19.5-43.6 10.5c-15.3-9.2-20.2-29.2-10.7-44.4l17.5-28z"
                                                    />
                                                </svg>
                                            </SecondaryButton>
                                        </span>

                                        <Link
                                            v-if="
                                                $page.props.auth.user.group
                                                    ?.id &&
                                                !survey.deleted_at &&
                                                !$page.props.permissions.includes(
                                                    'manage surveys'
                                                )
                                            "
                                            :href="
                                                route('surveys.show', survey)
                                            "
                                        >
                                            <SecondaryButton>
                                                {{
                                                    hasResponded(survey)
                                                        ? "View"
                                                        : "Start"
                                                }}
                                            </SecondaryButton>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
