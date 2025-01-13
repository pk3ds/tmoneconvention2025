<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

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
                <div
                    class="relative py-24 overflow-hidden bg-gray-900 sm:rounded-lg isolate sm:py-32"
                >
                    <img
                        src="/images/BG-Chevron-01.png"
                        alt=""
                        class="absolute inset-0 object-cover w-full h-full -z-10"
                    />
                    <div class="relative px-6 mx-auto max-w-7xl lg:px-8">
                        <div class="max-w-2xl mx-auto lg:mx-0 lg:max-w-xl">
                            <p
                                class="p-4 mt-2 text-3xl font-bold tracking-wide text-cobalt-blue bg-grey font-title sm:text-4xl"
                            >
                                TM One Convention 2025
                            </p>
                        </div>

                        <dl
                            class="grid max-w-2xl grid-cols-1 mx-auto mt-16 text-white gap-x-8 gap-y-10 sm:mt-20 sm:grid-cols-2 sm:gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-4"
                        >
                            <!-- User Info Section -->
                            <div
                                class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                            >
                                <dt class="text-lg leading-6">
                                    Points collected
                                </dt>
                                <dd
                                    class="text-3xl font-semibold tracking-tight font-title"
                                >
                                    {{ $page.props.auth.user.points }}
                                </dd>
                            </div>
                            <div
                                class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                            >
                                <dt class="text-lg leading-6">
                                    PWR
                                    {{
                                        (
                                            $page.props.auth.user.group?.name ??
                                            "None"
                                        ).substring(0, 2)
                                    }}
                                </dt>
                                <dd
                                    class="text-3xl font-semibold tracking-tight font-title"
                                >
                                    {{
                                        (
                                            $page.props.auth.user.group?.name ??
                                            "None"
                                        ).substring(4)
                                    }}
                                </dd>
                            </div>
                            <div
                                class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                            >
                                <dt class="text-lg leading-6">Room number</dt>
                                <dd
                                    class="text-3xl font-semibold tracking-tight font-title"
                                >
                                    {{ $page.props.auth.user.room_no ?? "KIV" }}
                                </dd>
                            </div>

                            <!-- Spacer div for grid alignment -->
                            <div></div>

                            <!-- Pickup Section -->
                            <div class="col-span-2 mt-8">
                                <h3
                                    class="mb-4 text-xl font-semibold text-white"
                                >
                                    Pick-up point
                                </h3>
                                <div
                                    v-if="
                                        $page.props.auth.user?.pickup_route ===
                                        'Own Transport'
                                    "
                                    class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                >
                                    <dd
                                        class="text-3xl font-semibold tracking-tight font-title"
                                    >
                                        Own Transport
                                    </dd>
                                </div>
                                <div
                                    v-else
                                    class="grid grid-cols-1 gap-4 sm:grid-cols-3"
                                >
                                    <div
                                        class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                    >
                                        <dt class="text-lg leading-6">Route</dt>
                                        <dd
                                            class="text-3xl font-semibold tracking-tight font-title"
                                        >
                                            {{
                                                $page.props.auth.user
                                                    ?.pickup_route ?? "KIV"
                                            }}
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                    >
                                        <dt class="text-lg leading-6">Date</dt>
                                        <dd
                                            class="text-3xl font-semibold tracking-tight font-title"
                                        >
                                            {{
                                                $page.props.auth.user
                                                    ?.pickup_date ?? "KIV"
                                            }}
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                    >
                                        <dt class="text-lg leading-6">
                                            Bus Number
                                        </dt>
                                        <dd
                                            class="text-3xl font-semibold tracking-tight font-title"
                                        >
                                            {{
                                                $page.props.auth.user
                                                    ?.pickup_bus_no ?? "KIV"
                                            }}
                                        </dd>
                                    </div>
                                </div>
                            </div>

                            <!-- Drop-off Section -->
                            <div class="col-span-2 mt-8">
                                <h3
                                    class="mb-4 text-xl font-semibold text-white"
                                >
                                    Drop-off point
                                </h3>
                                <div
                                    v-if="
                                        $page.props.auth.user?.dropoff_route ===
                                        'Own Transport'
                                    "
                                    class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                >
                                    <dd
                                        class="text-3xl font-semibold tracking-tight font-title"
                                    >
                                        Own Transport
                                    </dd>
                                </div>
                                <div
                                    v-else
                                    class="grid grid-cols-1 gap-4 sm:grid-cols-3"
                                >
                                    <div
                                        class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                    >
                                        <dt class="text-lg leading-6">Route</dt>
                                        <dd
                                            class="text-3xl font-semibold tracking-tight font-title"
                                        >
                                            {{
                                                $page.props.auth.user
                                                    ?.dropoff_route ?? "KIV"
                                            }}
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                    >
                                        <dt class="text-lg leading-6">Date</dt>
                                        <dd
                                            class="text-3xl font-semibold tracking-tight font-title"
                                        >
                                            {{
                                                $page.props.auth.user
                                                    ?.dropoff_date ?? "KIV"
                                            }}
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col pl-6 border-l gap-y-3 border-white/10"
                                    >
                                        <dt class="text-lg leading-6">
                                            Bus Number
                                        </dt>
                                        <dd
                                            class="text-3xl font-semibold tracking-tight font-title"
                                        >
                                            {{
                                                $page.props.auth.user
                                                    ?.dropoff_bus_no ?? "KIV"
                                            }}
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
