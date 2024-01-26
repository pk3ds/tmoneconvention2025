<script setup>
const props = defineProps({
    session: Object,
});
</script>

<template>
    <header class="flex justify-between">
        <div>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Attendees Information
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                View users checked in to the session.
            </p>
        </div>
        <!-- TODO enable button? -->
        <!-- <PrimaryButton class="px-4 my-2 me-2" @click.prevent="report">
            Report?
        </PrimaryButton> -->
    </header>

    <div class="mt-8 -mx-4 sm:-mx-0">
        <!-- FIXME session users -->
        <h1
            class="text-base leading-6 text-gray-900"
            v-if="session.users?.length <= 0"
        >
            No users to display
        </h1>
        <table v-else class="min-w-full divide-y divide-gray-300">
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
                        Staff ID
                    </th>
                    <th
                        scope="col"
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"
                    >
                        Email
                    </th>
                    <th
                        scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                        Phone No
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- FIXME session users -->
                <tr v-for="user in session.users">
                    <td
                        class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                    >
                        <span class="flex gap-2">
                            {{ user.name }}
                        </span>
                        <dl class="font-normal lg:hidden">
                            <dt class="sr-only">Staff ID</dt>
                            <dd class="mt-1 text-gray-700 truncate">
                                {{ user.staff_id }}
                            </dd>
                            <dt class="sr-only sm:hidden">Email</dt>
                            <dd class="mt-1 text-gray-500 truncate sm:hidden">
                                {{ user.email }}
                            </dd>
                        </dl>
                    </td>
                    <td
                        class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
                    >
                        {{ user.staff_id }}
                    </td>
                    <td
                        class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"
                    >
                        {{ user.email }}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        {{ user.phone_no }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
