<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import Details from "./Partials/Details.vue";
import Users from "./Partials/Users.vue";
import Awards from "./Partials/Awards.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import ActivityLog from "@/Components/ActivityLog.vue";

const props = defineProps({
    group: Object,
    activities: Object,
});

const form = useForm({
    name: props.group.name,
    points: props.group.points,
});
</script>

<template>
    <Head title="Edit Group" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('groups.index')"
                    class="ml-4 text-sm font-medium"
                >
                    Groups
                </Link>
            </BreadcrumbItem>
            <BreadcrumbItem>
                <Link href="#" class="ml-4 text-sm font-medium"> Edit </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <div class="mb-4 border-b border-gray-200">
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
                                    id="users-tab"
                                    data-tabs-target="#users"
                                    type="button"
                                    role="tab"
                                    aria-controls="users"
                                    aria-selected="false"
                                >
                                    users
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
                    </div>
                    <div id="default-tab-content">
                        <div
                            class="hidden p-4 rounded-lg"
                            id="details"
                            role="tabpanel"
                            aria-labelledby="details-tab"
                        >
                            <Details :form="form" :group="group" />
                        </div>
                        <div
                            class="hidden p-4 rounded-lg"
                            id="users"
                            role="tabpanel"
                            aria-labelledby="users-tab"
                        >
                            <Users :group="group" />
                        </div>
                        <div
                            class="hidden p-4 rounded-lg"
                            id="awards"
                            role="tabpanel"
                            aria-labelledby="awards-tab"
                        >
                            <Awards :group="group" />
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
