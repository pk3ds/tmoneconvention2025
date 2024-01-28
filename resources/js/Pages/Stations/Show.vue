<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    station: Object,
});

const back = () => {
    window.history.back();
};
</script>

<template>
    <Head title="PWRGAME Quiz" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('stations.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Stations
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Start
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1
                                        class="text-base font-semibold leading-6 text-gray-900"
                                    >
                                        PWRGAME
                                    </h1>
                                    <p class="mt-2 text-sm text-gray-700">
                                        A list of all the quizzes in the
                                        station.
                                    </p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <SecondaryButton @click="back">
                                        Back
                                    </SecondaryButton>
                                </div>
                            </div>
                            <div class="mt-8 -mx-4 sm:-mx-0">
                                <h1
                                    class="text-base leading-6 text-gray-900"
                                    v-if="station.quizzes?.length <= 0"
                                >
                                    No quizzes to display
                                </h1>
                                <table
                                    v-else
                                    class="min-w-full divide-y divide-gray-300"
                                >
                                    <thead>
                                        <tr>
                                            <th
                                                scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                            >
                                                Name
                                            </th>
                                            <th
                                                scope="col"
                                                class="relative py-3.5 pl-3 pr-4 sm:pr-0"
                                            >
                                                <span class="sr-only"
                                                    >Edit</span
                                                >
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200"
                                    >
                                        <tr v-for="quiz in station.quizzes">
                                            <td
                                                class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                                            >
                                                <span class="flex gap-2">
                                                    {{ quiz.name }}
                                                </span>
                                            </td>

                                            <td
                                                class="flex justify-end gap-4 px-3 py-4"
                                            >
                                                <Link
                                                    v-if="
                                                        $page.props.auth.user
                                                            .group?.id
                                                    "
                                                    :href="
                                                        route(
                                                            'attempts.create',
                                                            quiz
                                                        )
                                                    "
                                                >
                                                    <PrimaryButton>
                                                        Attempt
                                                    </PrimaryButton>
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
