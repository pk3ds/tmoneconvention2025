<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    users: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="py-12">
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
                                        Users
                                    </h1>
                                    <p class="mt-2 text-sm text-gray-700">
                                        A list of all the users in your account
                                        including their name, title, email and
                                        role.
                                    </p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <button
                                        type="button"
                                        class="block px-3 py-2 text-sm font-semibold text-center text-white rounded-md shadow-sm bg-cobalt-blue hover:bg-ultramarine focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cobalt-blue"
                                    >
                                        Add user
                                    </button>
                                </div>
                            </div>
                            <div class="mt-8 -mx-4 sm:-mx-0">
                                <table
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
                                                class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                                            >
                                                Staff ID
                                            </th>
                                            <th
                                                scope="col"
                                                class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"
                                            >
                                                Email
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Role
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
                                            v-for="user in users"
                                            :key="user.email"
                                        >
                                            <td
                                                class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                                            >
                                                {{ user.name }}
                                                <dl
                                                    class="font-normal lg:hidden"
                                                >
                                                    <dt class="sr-only">
                                                        Staff ID
                                                    </dt>
                                                    <dd
                                                        class="mt-1 text-gray-700 truncate"
                                                    >
                                                        {{ user.staff_id }}
                                                    </dd>
                                                    <dt
                                                        class="sr-only sm:hidden"
                                                    >
                                                        Email
                                                    </dt>
                                                    <dd
                                                        class="mt-1 text-gray-500 truncate sm:hidden"
                                                    >
                                                        {{ user.email }}
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
                                            >
                                                {{ user.staff_id }}
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"
                                            >
                                                {{ user.email }}
                                            </td>
                                            <td
                                                class="px-3 py-4 text-sm text-gray-500"
                                            >
                                                {{
                                                    user.roles
                                                        ? user.roles[0].name
                                                        : "None"
                                                }}
                                            </td>
                                            <td
                                                class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-0"
                                            >
                                                <Link
                                                    href="#"
                                                    class="text-cobalt-blue hover:text-indigo-900"
                                                    >Edit<span class="sr-only"
                                                        >, {{ user.name }}</span
                                                    ></Link
                                                >
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
