<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    roles: Object,
    user: Object,
    activities: Object,
});

const form = useForm({
    name: props.user.name,
    staff_id: props.user.staff_id,
    phone_no: props.user.phone_no,
    email: props.user.email,
    role: props.user.roles[0]?.name,
    password: "",
    password_confirmation: "",
});

const formatDate = (date) => {
    return new Intl.DateTimeFormat("en-my", {
        dateStyle: "medium",
        timeStyle: "short",
        timeZone: "Asia/Kuala_Lumpur",
        hour12: false,
    }).format(new Date(date));
};
</script>

<template>
    <Head title="Edit User" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    :href="route('users.index')"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Users
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
                <div
                    class="grid grid-cols-12 gap-2 p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg"
                >
                    <section class="col-span-12 md:col-span-6">
                        <header>
                            <h2
                                class="text-lg font-medium text-gray-900 dark:text-gray-100"
                            >
                                User Information
                            </h2>

                            <p
                                class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                            >
                                Edit existing user.
                            </p>
                        </header>

                        <form
                            @submit.prevent="
                                form.patch(route('users.update', user))
                            "
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
                                <InputLabel for="staff_id" value="Staff ID" />

                                <TextInput
                                    id="staff_id"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.staff_id"
                                    required
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.staff_id"
                                />
                            </div>

                            <div>
                                <InputLabel for="phone_no" value="Phone No" />

                                <TextInput
                                    id="phone_no"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.phone_no"
                                    required
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.phone_no"
                                />
                            </div>

                            <div>
                                <InputLabel for="email" value="Email" />

                                <TextInput
                                    id="email"
                                    type="email"
                                    class="block w-full mt-1"
                                    v-model="form.email"
                                    required
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>

                            <div>
                                <InputLabel for="role" value="Role" />
                                <select
                                    v-model="form.role"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                >
                                    <option
                                        v-for="role in roles"
                                        :value="role.name"
                                    >
                                        {{ role.name }}
                                    </option>
                                </select>

                                <InputError
                                    :message="form.errors.role"
                                    class="mt-2"
                                />
                            </div>

                            <div v-if="form.role != 'user'">
                                <InputLabel for="password" value="Password" />

                                <TextInput
                                    id="password"
                                    type="password"
                                    class="block w-full mt-1"
                                    v-model="form.password"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>

                            <div v-if="form.role != 'user'">
                                <InputLabel
                                    for="password"
                                    value="Confirm Password"
                                />

                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    class="block w-full mt-1"
                                    v-model="form.password_confirmation"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password_confirmation"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >Save</PrimaryButton
                                >
                            </div>
                        </form>
                    </section>

                    <section class="hidden col-span-6 text-right md:block">
                        <div
                            id="accordion-flush"
                            data-accordion="collapse"
                            data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                            data-inactive-classes="text-gray-500 dark:text-gray-400"
                        >
                            <h2 id="accordion-flush-heading-1">
                                <button
                                    type="button"
                                    class="flex items-center justify-end w-full gap-3 py-2 font-medium text-right text-gray-500"
                                    data-accordion-target="#accordion-flush-body-1"
                                    aria-expanded="true"
                                    aria-controls="accordion-flush-body-1"
                                >
                                    <span>Activity Log</span>
                                    <svg
                                        data-accordion-icon
                                        class="w-3 h-3 rotate-180 shrink-0"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 10 6"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5 5 1 1 5"
                                        />
                                    </svg>
                                </button>
                            </h2>
                            <div
                                id="accordion-flush-body-1"
                                class="hidden"
                                aria-labelledby="accordion-flush-heading-1"
                            >
                                <div class="py-2">
                                    <ol
                                        class="relative mt-6 border-gray-200 border-e"
                                    >
                                        <li
                                            v-for="activity in activities"
                                            class="mb-10 me-4"
                                        >
                                            <div
                                                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -end-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"
                                            ></div>
                                            <time
                                                class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"
                                                >{{
                                                    formatDate(
                                                        activity.created_at
                                                    )
                                                }}</time
                                            >
                                            <h3
                                                class="text-lg font-semibold text-gray-900 capitalize dark:text-white"
                                            >
                                                {{ activity.description }}
                                            </h3>
                                            <div
                                                v-if="
                                                    activity.properties
                                                        .attributes
                                                "
                                                class="flex justify-end"
                                            >
                                                <table
                                                    class="px-2 text-sm text-left text-gray-500"
                                                >
                                                    <thead
                                                        class="text-xs text-gray-700 uppercase bg-gray-50"
                                                    >
                                                        <tr>
                                                            <td
                                                                class="px-1 py-1"
                                                            >
                                                                Key
                                                            </td>
                                                            <td
                                                                class="px-1 py-1"
                                                            >
                                                                Value
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="[
                                                                key,
                                                                value,
                                                            ] in Object.entries(
                                                                activity
                                                                    .properties
                                                                    .attributes
                                                            )"
                                                            class="bg-white border-b"
                                                        >
                                                            <td
                                                                scope="col"
                                                                class="px-1 py-1"
                                                            >
                                                                {{ key }}
                                                            </td>
                                                            <td
                                                                scope="col"
                                                                class="px-1 py-1"
                                                            >
                                                                {{ value }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
