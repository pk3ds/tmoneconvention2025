<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    search: String,
    users: Object,
});

const form = useForm({
    search: props.search ?? null,
});

const search = () => {
    router.get(route("users.index", { search: form.search }));
};
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="py-12">
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
                            placeholder="Search users..."
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
                                        Users
                                    </h1>
                                    <p class="mt-2 text-sm text-gray-700">
                                        A list of all the users in your account
                                        including their name, title, email and
                                        role.
                                    </p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <PrimaryButton> Add user </PrimaryButton>
                                </div>
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
                                                class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                                            >
                                                Staff ID
                                            </th>
                                            <th
                                                scope="col"
                                                class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"
                                            >
                                                Phone No
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
                                                        Phone No
                                                    </dt>
                                                    <dd
                                                        class="mt-1 text-gray-500 truncate sm:hidden"
                                                    >
                                                        {{ user.phone_no }}
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
                                                {{ user.phone_no }}
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
