<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const passport = [
    {
        imageUrl: "/images/PWRGame-01.png",
    },
    {
        imageUrl: "/images/PWRGame-02.png",
    },
    {
        imageUrl: "/images/PWRGame-03.png",
    },
    {
        imageUrl: "/images/PWRGame-04.png",
    },
    {
        imageUrl: "/images/PWRGame-05.png",
    },
    {
        imageUrl: "/images/PWRGame-06.png",
    },
    {
        imageUrl: "/images/PWRGame-07.png",
    },
    {
        imageUrl: "/images/PWRGame-08.png",
    },
    {
        imageUrl: "/images/PWRGame-09.png",
    },
    {
        imageUrl: "/images/PWRGame-10.png",
    },
    {
        imageUrl: "/images/PWRGame-11.png",
    },
    {
        imageUrl: "/images/PWRGame-12.png",
    },
    {
        imageUrl: "/images/PWRGame-13.png",
    },
];
</script>

<template>
    <Head title="Passport" />

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

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="py-6 bg-white rounded-md">
                    <div class="px-6 mx-auto max-w-7xl lg:px-8">
                        <ul
                            role="list"
                            class="grid max-w-2xl grid-cols-1 mx-auto gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2"
                        >
                            <li v-for="person in passport" :key="person.name">
                                <img
                                    class="object-cover w-full rounded-2xl drop-shadow-2xl"
                                    :src="person.imageUrl"
                                    alt=""
                                />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
