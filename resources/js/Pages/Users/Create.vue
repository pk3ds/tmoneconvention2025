<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    groups: Object,
    roles: Object,
});

const form = useForm({
    name: "",
    staff_id: "",
    phone_no: "",
    email: "",
    room_no: "",
    pickup_location: "",
    group_id: "",
    role: "",
    password: "",
    password_confirmation: "",
});

const back = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Create User" />

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
                    Create
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg"
                >
                    <section>
                        <header class="flex justify-between">
                            <div>
                                <h2
                                    class="text-lg font-medium text-gray-900 dark:text-gray-100"
                                >
                                    User Information
                                </h2>

                                <p
                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                                >
                                    Create new user.
                                </p>
                            </div>
                            <SecondaryButton
                                class="px-4 my-2 me-2"
                                @click="back"
                            >
                                Back
                            </SecondaryButton>
                        </header>

                        <form
                            @submit.prevent="form.post(route('users.store'))"
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
                                <InputLabel for="room_no" value="Room No" />

                                <TextInput
                                    id="room_no"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.room_no"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.room_no"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="pickup_location"
                                    value="Pickup Location"
                                />

                                <TextInput
                                    id="pickup_location"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.pickup_location"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.pickup_location"
                                />
                            </div>

                            <div>
                                <InputLabel for="group_id" value="Group" />
                                <select
                                    v-model="form.group_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                >
                                    <option
                                        v-for="group in groups"
                                        :value="group.id"
                                    >
                                        {{ group.name }}
                                    </option>
                                </select>

                                <InputError
                                    :message="form.errors.group_id"
                                    class="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel for="role" value="Role" />
                                <select
                                    required
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
                                    required
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
                                    required
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
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
