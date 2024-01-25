<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BreadcrumbItem from "@/Components/BreadcrumbItem.vue";
import { Head, Link } from "@inertiajs/vue3";

const stats = [
    { id: 1, name: "Passport stamps", value: "8" },
    { id: 2, name: "Points collected", value: "12,345" },
    { id: 3, name: "Group name", value: "RedBull" },
    { id: 4, name: "Room Number", value: "13-03" },
];
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #breadcrumb>
            <BreadcrumbItem>
                <Link
                    href="#"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    Dashboard
                </Link>
            </BreadcrumbItem>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="relative py-24 overflow-hidden bg-gray-900 sm:rounded-lg isolate sm:py-32"
                >
                    <img
                        src="/images/BG-Chevron-01.png"
                        alt=""
                        class="absolute inset-0 object-cover w-full h-full -z-10"
                    />
                    <div class="relative px-6 mx-auto max-w-7xl lg:px-8">
                        <div
                            class="absolute -bottom-8 -left-96 -z-10 transform-gpu blur-3xl sm:-bottom-64 sm:-left-40 lg:-bottom-32 lg:left-8 xl:-left-10"
                            aria-hidden="true"
                        >
                            <div
                                class="aspect-[1266/975] w-[79.125rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                                style="
                                    clip-path: polygon(
                                        74.1% 44.1%,
                                        100% 61.6%,
                                        97.5% 26.9%,
                                        85.5% 0.1%,
                                        80.7% 2%,
                                        72.5% 32.5%,
                                        60.2% 62.4%,
                                        52.4% 68.1%,
                                        47.5% 58.3%,
                                        45.2% 34.5%,
                                        27.5% 76.7%,
                                        0.1% 64.9%,
                                        17.9% 100%,
                                        27.6% 76.8%,
                                        76.1% 97.7%,
                                        74.1% 44.1%
                                    );
                                "
                            />
                        </div>
                        <div class="max-w-2xl mx-auto lg:mx-0 lg:max-w-xl">
                            <h2
                                class="text-base font-semibold leading-8 text-accent-orange"
                            >
                                at a glance
                            </h2>
                            <p
                                class="p-4 mt-2 text-3xl font-bold tracking-wide text-cobalt-blue bg-grey font-title sm:text-4xl"
                            >
                                TM One Convention 2024
                            </p>
                        </div>
                        <dl
                            class="grid max-w-2xl grid-cols-1 mx-auto mt-16 text-white gap-x-8 gap-y-10 sm:mt-20 sm:grid-cols-2 sm:gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-4"
                        >
                            <div
                                v-for="stat in stats"
                                :key="stat.id"
                                class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                            >
                                <dt class="text-sm leading-6">
                                    {{ stat.name }}
                                </dt>
                                <dd
                                    class="order-first text-3xl font-semibold tracking-tight font-title"
                                >
                                    {{ stat.value }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
