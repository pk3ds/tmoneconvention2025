<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Details from "./Partials/Details.vue";
import Awards from "./Partials/Awards.vue";
import ActivityLog from "@/Components/ActivityLog.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    groups: Object,
    roles: Object,
    user: Object,
    activities: Object,
});

const back = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Edit Committee" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('committees.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Committees
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Edit
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <div
                        class="flex justify-between mb-4 border-b border-gray-200"
                    >
                        <ul
                            class="flex flex-wrap -mb-px text-sm font-medium text-center"
                            id="default-tab"
                            data-tabs-toggle="#default-tab-content"
                            role="tablist"
                        >
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 capitalize border-b-2 rounded-t-lg"
                                    id="details-tab"
                                    data-tabs-target="#details"
                                    type="button"
                                    role="tab"
                                    aria-controls="details"
                                    aria-selected="false"
                                >
                                    details
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="awards-tab"
                                    data-tabs-target="#awards"
                                    type="button"
                                    role="tab"
                                    aria-controls="awards"
                                    aria-selected="false"
                                >
                                    awards
                                </button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="logs-tab"
                                    data-tabs-target="#logs"
                                    type="button"
                                    role="tab"
                                    aria-controls="logs"
                                    aria-selected="false"
                                >
                                    logs
                                </button>
                            </li>
                        </ul>
                        <SecondaryButton class="px-4 my-2 me-2" @click="back">
                            Back
                        </SecondaryButton>
                    </div>
                    <div id="default-tab-content">
                        <div
                            class="hidden p-4 rounded-lg"
                            id="details"
                            role="tabpanel"
                            aria-labelledby="details-tab"
                        >
                            <Details
                                :groups="groups"
                                :roles="roles"
                                :user="user"
                            />
                        </div>
                        <div
                            class="hidden p-4 rounded-lg"
                            id="awards"
                            role="tabpanel"
                            aria-labelledby="awards-tab"
                        >
                            <Awards :user="user" />
                        </div>
                        <div
                            class="hidden p-4 rounded-lg"
                            id="logs"
                            role="tabpanel"
                            aria-labelledby="logs-tab"
                        >
                            <ActivityLog :activities="activities" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
