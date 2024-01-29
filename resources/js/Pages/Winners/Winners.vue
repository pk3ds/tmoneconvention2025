<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    winners: Object,
});
</script>

<style>
/* body {
    background-image: url("../../../../public/images/BG-01.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
} */
</style>

<template>
    <Head title="Lucky Draw" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <li class="flex">
                <div class="flex items-center">
                    <svg
                        class="flex-shrink-0 w-6 h-full text-gray-100"
                        viewBox="0 0 24 44"
                        preserveAspectRatio="none"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                </div>
            </li>
        </template>

        <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div
                class="mt-8 overflow-hidden rounded-lg shadow-sm bg-gradient-to-r from-light-orange to-light-blue"
            >
                <div class="p-6 text-gray-900">
                    <p
                        v-if="winners.length === 0"
                        class="px-3 text-xl font-bold text-center md:text-2xl"
                    >
                        No Lucky Draw Running
                    </p>
                    <p
                        v-if="winners.length !== 0"
                        class="px-3 text-xl font-bold text-center md:text-2xl"
                    >
                        Lucky Draw Winners
                    </p>
                    <div v-if="winners.length !== 0" class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div
                                class="inline-block min-w-full py-2 sm:px-6 lg:px-8"
                            >
                                <div class="overflow-hidden rounded">
                                    <table class="min-w-full">
                                        <thead class="border-b border-black">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-4 font-extrabold text-left text-gray-900 text-md"
                                                >
                                                    #
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-4 font-extrabold text-left text-gray-900 text-md"
                                                >
                                                    Name
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-4 font-extrabold text-left text-gray-900 text-md"
                                                >
                                                    Prize
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-4 font-extrabold text-left text-gray-900 text-md"
                                                >
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    winner, index
                                                ) in winners"
                                                class="border-b border-black"
                                            >
                                                <td
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"
                                                >
                                                    {{ index + 1 }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-bold text-gray-900 whitespace-nowrap"
                                                >
                                                    {{ winner.user?.name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap"
                                                >
                                                    {{ winner.prize }}
                                                </td>
                                                <td
                                                    v-if="winner.is_claimed"
                                                    class="flex px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap"
                                                >
                                                    <svg
                                                        class="w-5 h-5 mr-3 text-gray-800"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"
                                                        />
                                                    </svg>
                                                    <p>Claimed</p>
                                                </td>
                                                <td
                                                    v-if="!winner.is_claimed"
                                                    class="flex px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap"
                                                >
                                                    <span
                                                        class="absolute animate-ping"
                                                    >
                                                        <svg
                                                            class="w-5 h-5 text-ultramarine"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512"
                                                            fill="currentColor"
                                                        >
                                                            <path
                                                                d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"
                                                            />
                                                        </svg>
                                                    </span>
                                                    <span
                                                        class="relative inline-flex"
                                                    >
                                                        <svg
                                                            class="w-5 h-5 text-ultramarine"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512"
                                                            fill="currentColor"
                                                        >
                                                            <path
                                                                d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"
                                                            />
                                                        </svg>
                                                    </span>
                                                    <p class="ml-3">
                                                        Not claimed
                                                    </p>
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
        </div>
    </AuthenticatedLayout>
</template>
