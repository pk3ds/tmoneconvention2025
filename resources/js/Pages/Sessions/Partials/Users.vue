<script setup>
const props = defineProps({
    session: Object,
});

const formatDate = (date) => {
    return new Intl.DateTimeFormat("en-my", {
        dateStyle: "medium",
        timeStyle: "short",
        timeZone: "Asia/Kuala_Lumpur",
        hour12: false,
    }).format(new Date(date));
};
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
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                    >
                        Group
                    </th>
                    <th
                        scope="col"
                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"
                    >
                        Points
                    </th>
                    <th
                        scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                        Check In Time
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
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
                            <dt class="sr-only">Group</dt>
                            <dd class="mt-1 text-gray-700 truncate">
                                {{ user.group?.name }}
                            </dd>
                            <dt class="sr-only sm:hidden">Points</dt>
                            <dd class="mt-1 text-gray-500 truncate sm:hidden">
                                {{ user.pivot?.points }}
                            </dd>
                        </dl>
                    </td>
                    <td
                        class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
                    >
                        {{ user.staff_id }}
                    </td>
                    <td
                        class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"
                    >
                        {{ user.group?.name }}
                    </td>
                    <td
                        class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"
                    >
                        {{ user.pivot?.points }}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        {{ formatDate(user.pivot?.created_at) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
