<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import NumberInput from "@/Components/NumberInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    stations: Object,
    groups: Object,
    roles: Object,
    user: Object,
});

const form = useForm({
    name: props.user.name,
    staff_id: props.user.staff_id,
    phone_no: props.user.phone_no,
    email: props.user.email,
    room_no: props.user.room_no,
    pickup_location: props.user.pickup_location,
    group_id: props.user.group_id,
    station_id: props.user.station_id,
    role: props.user.roles[0]?.name,
    password: "",
    password_confirmation: "",
    points: props.user.points,
});

const pointsForm = useForm({
    points: "",
    remarks: "",
});
</script>

<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Edit existing user.
        </p>
    </header>

    <form
        @submit.prevent="form.patch(route('committees.update', user))"
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

            <InputError class="mt-2" :message="form.errors.name" />
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

            <InputError class="mt-2" :message="form.errors.staff_id" />
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

            <InputError class="mt-2" :message="form.errors.phone_no" />
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

            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div>
            <InputLabel for="room_no" value="Room No (optional)" />

            <TextInput
                id="room_no"
                type="text"
                class="block w-full mt-1"
                v-model="form.room_no"
            />

            <InputError class="mt-2" :message="form.errors.room_no" />
        </div>

        <div>
            <InputLabel
                for="pickup_location"
                value="Pickup Location (optional)"
            />

            <TextInput
                id="pickup_location"
                type="text"
                class="block w-full mt-1"
                v-model="form.pickup_location"
            />

            <InputError class="mt-2" :message="form.errors.pickup_location" />
        </div>

        <div>
            <InputLabel for="group_id" value="Group (optional)" />
            <select
                v-model="form.group_id"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
            >
                <option v-for="group in groups" :value="group.id">
                    {{ group.name }}
                </option>
            </select>

            <InputError :message="form.errors.group_id" class="mt-2" />
        </div>

        <div>
            <InputLabel for="station_id" value="Station (optional)" />
            <select
                v-model="form.station_id"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
            >
                <option v-for="station in stations" :value="station.id">
                    {{ station.name }}
                </option>
            </select>

            <InputError :message="form.errors.station_id" class="mt-2" />
        </div>

        <div>
            <InputLabel for="role" value="Role" />
            <select
                required
                v-model="form.role"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
            >
                <option v-for="role in roles" :value="role.name">
                    {{ role.name }}
                </option>
            </select>

            <InputError :message="form.errors.role" class="mt-2" />
        </div>

        <div v-if="form.role != 'user'">
            <InputLabel for="password" value="Password" />

            <TextInput
                id="password"
                type="password"
                class="block w-full mt-1"
                v-model="form.password"
            />

            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div v-if="form.role != 'user'">
            <InputLabel for="password" value="Confirm Password" />

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

        <div class="flex items-center justify-between gap-4">
            <PrimaryButton :disabled="form.processing"> Save </PrimaryButton>
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
                            pointsForm.patch(route('users.points', user), {
                                preserveScroll: true,
                                onSuccess: (res) => {
                                    form.points = res.props.user.points;
                                    pointsForm.points = '';
                                    pointsForm.remarks = '';
                                },
                            })
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
                        <div>
                            <label
                                for="remarks"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Remarks</label
                            >
                            <input
                                type="text"
                                name="remarks"
                                v-model="pointsForm.remarks"
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
