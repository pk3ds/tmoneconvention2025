<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import NumberInput from "@/Components/NumberInput.vue";
import ActivityLog from "@/Components/ActivityLog.vue";
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
    points: props.user.points,
});

const pointsForm = useForm({
    points: "",
});
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

                            <div>
                                <InputLabel for="points" value="Points" />

                                <NumberInput
                                    id="points"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.points"
                                    readonly
                                />
                            </div>

                            <div
                                class="flex items-center justify-between gap-4"
                            >
                                <PrimaryButton :disabled="form.processing">
                                    Save
                                </PrimaryButton>
                                <PrimaryButton
                                    :disabled="form.processing"
                                    type="button"
                                    data-modal-target="points-modal"
                                    data-modal-toggle="points-modal"
                                >
                                    Points
                                </PrimaryButton>
                            </div>
                        </form>
                    </section>

                    <section class="hidden col-span-6 text-right md:block">
                        <ActivityLog :activities="activities" />
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

    <div
        id="points-modal"
        tabindex="-1"
        aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600"
                >
                    <h3
                        class="text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        Input User Points
                    </h3>
                    <button
                        type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="points-modal"
                    >
                        <svg
                            class="w-3 h-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form
                        @submit.prevent="
                            pointsForm.patch(route('users.points', user))
                        "
                        class="space-y-5"
                    >
                        <div>
                            <label
                                for="points"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Points</label
                            >
                            <input
                                type="text"
                                name="points"
                                v-model="pointsForm.points"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required
                            />
                        </div>
                        <div class="flex justify-end">
                            <PrimaryButton data-modal-hide="points-modal">
                                Update
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
