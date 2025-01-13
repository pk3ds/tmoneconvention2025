<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    search: String,
    users: Object,
});

const form = useForm({
    search: props.search ?? null,
});

const search = () => {
    router.get(route("members.index", { search: form.search }));
};

const comparePoints = (a, b) => {
    if (a.points > b.points) {
        return -1;
    }
    if (a.points < b.points) {
        return 1;
    }
    return 0;
};
</script>

<template>
    <Head title="Members" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Members
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <form class="mb-6" @submit.prevent="search">
                    <label
                        for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                        >Search</label
                    >
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3"
                        >
                            <svg
                                class="w-4 h-4 text-gray-500 dark:text-gray-400"
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
                            class="block w-full p-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-none sm:rounded-lg ps-10 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search members..."
                        />
                        <button
                            class="text-white font-semibold absolute end-2.5 bottom-2.5 bg-cobalt-blue font-title hover:bg-ultramarine focus:ring-4 focus:outline-none focus:ring-blue-300 tracking-widest rounded-md text-xs uppercase px-4 py-2"
                        >
                            Search
                        </button>
                    </div>
                </form>

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
                                        {{ $page.props.auth.user.group?.name }}
                                        PWRTEAM
                                    </h1>
                                    <p class="mt-2 text-sm text-gray-700">
                                        A list of your team members including
                                        their name, phone number and points.
                                    </p>
                                </div>
                                <div
                                    class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none"
                                ></div>
                            </div>
                            <div class="mt-8 -mx-4 sm:-mx-0">
                                <h1
                                    class="text-base leading-6 text-gray-900"
                                    v-if="users.length <= 0"
                                >
                                    No users to display
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
                                                class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"
                                            >
                                                Phone No
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Points
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
                                        <tr
                                            v-for="user in users.sort(
                                                comparePoints
                                            )"
                                        >
                                            <td
                                                class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                                            >
                                                <span class="flex gap-2">
                                                    {{ user.name }}

                                                    <svg
                                                        v-if="user.deleted_at"
                                                        class="w-3.5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                                        />
                                                    </svg>
                                                </span>
                                                <dl
                                                    class="font-normal lg:hidden"
                                                >
                                                    <dt
                                                        class="sr-only sm:hidden"
                                                    >
                                                        Phone No
                                                    </dt>
                                                    <dd
                                                        class="mt-1 text-gray-500 truncate sm:hidden"
                                                    >
                                                        {{ user.phone_no }}
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"
                                            >
                                                {{ user.phone_no }}
                                            </td>
                                            <td
                                                class="px-3 py-4 text-sm text-gray-500 capitalize"
                                            >
                                                {{ user.points }}
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
