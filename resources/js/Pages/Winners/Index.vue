<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, router } from "@inertiajs/vue3";

const props = defineProps({
    winners: Object,
});

const claim = (winner) => {
    router.patch(route("winners.claim", winner));
};
</script>

<template>
    <Head title="Winners" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Winners
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
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
                                        Winners
                                    </h1>
                                    <p class="mt-2 text-sm text-gray-700">
                                        A list of lucky draw winners.
                                    </p>
                                </div>
                                <div
                                    class="mt-4 space-x-4 sm:ml-16 sm:mt-0 sm:flex-none"
                                >
                                    <Link :href="route('winners.draw')">
                                        <PrimaryButton> Demo </PrimaryButton>
                                    </Link>
                                    <Link :href="route('winners.createSingle')">
                                        <PrimaryButton> Single </PrimaryButton>
                                    </Link>
                                    <Link
                                        :href="route('winners.createMultiple')"
                                    >
                                        <PrimaryButton>
                                            Multiple
                                        </PrimaryButton>
                                    </Link>
                                </div>
                            </div>
                            <div class="mt-8 -mx-4 sm:-mx-0">
                                <h1
                                    class="text-base leading-6 text-gray-900"
                                    v-if="winners.length <= 0"
                                >
                                    No winners to display
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
                                                Status
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
                                                Prize
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
                                        <tr v-for="winner in winners">
                                            <td
                                                class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                                            >
                                                <span class="flex gap-2">
                                                    {{ winner.user?.name }}
                                                </span>
                                                <dl
                                                    class="font-normal lg:hidden"
                                                >
                                                    <dt class="sr-only">
                                                        Status
                                                    </dt>
                                                    <dd
                                                        class="mt-1 text-gray-700 truncate"
                                                    >
                                                        {{
                                                            winner.is_claimed
                                                                ? "Claimed"
                                                                : "Not Claimed"
                                                        }}
                                                    </dd>
                                                    <dt
                                                        class="sr-only sm:hidden"
                                                    >
                                                        Phone No
                                                    </dt>
                                                    <dd
                                                        class="mt-1 text-gray-500 truncate sm:hidden"
                                                    >
                                                        {{
                                                            winner.user
                                                                ?.phone_no
                                                        }}
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
                                            >
                                                {{
                                                    winner.is_claimed
                                                        ? "Claimed"
                                                        : "Not Claimed"
                                                }}
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"
                                            >
                                                {{ winner.user?.phone_no }}
                                            </td>
                                            <td
                                                class="px-3 py-4 text-sm text-gray-500 capitalize"
                                            >
                                                {{ winner.prize }}
                                            </td>
                                            <td
                                                class="px-3 py-4 text-sm text-gray-500 capitalize"
                                            >
                                                <div
                                                    class="grid grid-cols-1 gap-10 px-3 py-4 sm:gap-4 lg:grid-cols-2"
                                                >
                                                    <Link
                                                        :href="
                                                            route(
                                                                'winners.edit',
                                                                winner
                                                            )
                                                        "
                                                    >
                                                        <PrimaryButton>
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
                                                        </PrimaryButton>
                                                    </Link>
                                                    <span
                                                        v-if="
                                                            !winner.is_claimed
                                                        "
                                                        @click="claim(winner)"
                                                    >
                                                        <SecondaryButton>
                                                            <svg
                                                                class="w-4"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                fill="currentColor"
                                                            >
                                                                <path
                                                                    d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"
                                                                />
                                                            </svg>
                                                        </SecondaryButton>
                                                    </span>
                                                </div>
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
