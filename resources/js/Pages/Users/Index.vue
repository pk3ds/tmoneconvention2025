<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";

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

const destroy = (user) => {
    router.delete(route("users.destroy", user), {
        onFinish: () => initFlowbite(),
    });
};

const restore = (user) => {
    router.put(route("users.restore", user));
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
                                    <Link :href="route('users.create')">
                                        <PrimaryButton>
                                            Add user
                                        </PrimaryButton>
                                    </Link>
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
                                                class="grid items-center grid-cols-1 gap-10 px-3 py-4 sm:gap-4 lg:grid-cols-2"
                                            >
                                                <Link
                                                    :href="
                                                        route(
                                                            'users.edit',
                                                            user
                                                        )
                                                    "
                                                    class="text-cobalt-blue hover:text-ultramarine"
                                                >
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
                                                </Link>
                                                <span
                                                    v-if="!user.deleted_at"
                                                    @click="destroy(user)"
                                                    class="text-red-700 cursor-pointer hover:text-red-500"
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
                                                </span>
                                                <span
                                                    v-if="user.deleted_at"
                                                    @click="restore(user)"
                                                    class="cursor-pointer text-cobalt-blue hover:text-ultramarine"
                                                    ><svg
                                                        class="w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            d="M163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3C140.6 6.8 151.7 0 163.8 0zM32 128H416L394.8 467c-1.6 25.3-22.6 45-47.9 45H101.1c-25.3 0-46.3-19.7-47.9-45L32 128zm192 64c-6.4 0-12.5 2.5-17 7l-80 80c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V408c0 13.3 10.7 24 24 24s24-10.7 24-24V273.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-4.5-4.5-10.6-7-17-7z"
                                                        />
                                                    </svg>
                                                </span>
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
