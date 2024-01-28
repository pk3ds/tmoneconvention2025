<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";
import { onMounted } from "vue";

onMounted(() => {
    initFlowbite();
});

const props = defineProps({
    session: Object,
});

const checkin = () => {
    router.post(route("checkins.store", props.session.uuid));
};
</script>

<template>
    <Head title="Check In" />
    <GuestLayout>
        <div class="max-w-sm p-6">
            <div class="flex items-center justify-start gap-3">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512"
                    class="mb-3 text-accent-orange w-7 h-7"
                    fill="currentColor"
                >
                    <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"
                    />
                </svg>
                <h5
                    class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                >
                    {{ session.name }}
                </h5>
            </div>

            <div class="flex items-center justify-center gap-4 my-4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512"
                    class="w-10 h-10"
                    fill="currentColor"
                >
                    <path
                        d="M256 0h64c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H256c-17.7 0-32-14.3-32-32V32c0-17.7 14.3-32 32-32zM64 64H192v48c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64zM176 437.3c0 5.9 4.8 10.7 10.7 10.7H389.3c5.9 0 10.7-4.8 10.7-10.7c0-29.5-23.9-53.3-53.3-53.3H229.3c-29.5 0-53.3 23.9-53.3 53.3zM288 352a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"
                    />
                </svg>
                <div class="font-medium">
                    <div>{{ $page.props.auth.user.name }}</div>
                    <div class="text-gray-500 dark:text-gray-400">
                        {{ $page.props.auth.user.staff_id }}
                    </div>
                </div>
            </div>

            <p class="mb-6 text-sm font-normal text-gray-500">
                You made it! Before checking in, could you verify the
                information above? If there is anything wrong, we will gladly
                fix it for you.
            </p>
            <div class="flex items-center justify-between">
                <PrimaryButton @click="checkin">Check In</PrimaryButton>
                <span class="rounded-md text-cobalt-blue">
                    Not you?
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="underline hover:text-ultramarine focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue"
                    >
                        Log Out</Link
                    >
                </span>
            </div>
        </div>
    </GuestLayout>
</template>
