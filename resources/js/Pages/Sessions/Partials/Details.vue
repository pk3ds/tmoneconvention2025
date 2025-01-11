<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";
import QRCodeVue3 from "qrcode-vue3";

const props = defineProps({
    session: Object,
});

const form = useForm({
    name: props.session.name,
    description: props.session.description,
    start_at: props.session.start_at,
    end_at: props.session.end_at,
    isCheckpoint: props.session.isCheckpoint,
    checkpointNo: props.session.checkpointNo,
});
</script>

<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Session Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Edit existing session.
        </p>
    </header>

    <form
        @submit.prevent="form.patch(route('sessions.update', session))"
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
            <InputLabel for="description" value="Description" />

            <TextInput
                id="description"
                type="text"
                class="block w-full mt-1"
                v-model="form.description"
            />

            <InputError class="mt-2" :message="form.errors.description" />
        </div>

        <div>
            <InputLabel for="start_at" value="Start Date" />

            <TextInput
                id="start_at"
                type="datetime-local"
                class="block w-full mt-1"
                v-model="form.start_at"
            />

            <InputError class="mt-2" :message="form.errors.start_at" />
        </div>

        <div>
            <InputLabel for="end_at" value="End Date" />

            <TextInput
                id="end_at"
                type="datetime-local"
                class="block w-full mt-1"
                v-model="form.end_at"
            />

            <InputError class="mt-2" :message="form.errors.end_at" />
        </div>

        <div>
            <div class="flex items-center mt-4">
                <input
                    id="isCheckpoint"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    v-model="form.isCheckpoint"
                />
                <label
                    for="isCheckpoint"
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >
                    Is Checkpoint
                </label>
            </div>

            <InputError class="mt-2" :message="form.errors.isCheckpoint" />
        </div>

        <div>
            <InputLabel for="checkpointNo" value="Checkpoint Number" />

            <TextInput
                id="checkpointNo"
                type="number"
                class="block w-full mt-1"
                v-model="form.checkpointNo"
            />

            <InputError class="mt-2" :message="form.errors.checkpointNo" />
        </div>

        <div class="flex items-center justify-between gap-4">
            <PrimaryButton :disabled="form.processing"> Save </PrimaryButton>
            <PrimaryButton
                :disabled="form.processing"
                type="button"
                data-modal-target="qr-modal"
                data-modal-toggle="qr-modal"
            >
                QR Code
            </PrimaryButton>
        </div>
    </form>

    <div
        id="qr-modal"
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
                        Session QR Code
                    </h3>
                    <button
                        type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="qr-modal"
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
                    <QRCodeVue3
                        :width="1000"
                        :height="1000"
                        :value="route('checkins.store', session.uuid)"
                        :qrOptions="{
                            typeNumber: 0,
                            mode: 'Byte',
                            errorCorrectionLevel: 'H',
                        }"
                        image="/images/Mini-Banner-2025.png"
                        :imageOptions="{
                            hideBackgroundDots: true,
                            imageSize: 0.4,
                            margin: 0,
                        }"
                        :dotsOptions="{
                            type: 'rounded',
                            color: '#2362DD',
                            gradient: {
                                type: 'linear',
                                rotation: 90,
                                colorStops: [
                                    { offset: 0, color: '#99B6FF' },
                                    { offset: 1, color: '#2362DD' },
                                ],
                            },
                        }"
                        :backgroundOptions="{ color: '#ffffff' }"
                        :cornersSquareOptions="{
                            type: 'extra-rounded',
                            color: '#2362DD',
                        }"
                        :cornersDotOptions="{
                            type: 'dot',
                            color: '#180092',
                        }"
                    />
                </div>
                <div class="flex items-center justify-center gap-4 p-4 md:p-5">
                    <Link :href="route('checkins.store', session.uuid)">
                        <PrimaryButton data-modal-hide="qr-modal">
                            Link
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
