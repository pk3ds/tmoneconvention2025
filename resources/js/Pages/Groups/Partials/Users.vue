<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
import * as XLSX from "xlsx";

const props = defineProps({
    group: Object,
});

const templateInput = ref(null);
const uploadedUsers = ref([]);

const destroy = (user) => {
    router.delete(route("users.destroy", user));
};

const restore = (id) => {
    router.put(route("users.restore", id));
};

const start = () => {
    templateInput.value.click();
};

const upload = (event) => {
    const template = event.target.files[0];

    const fileReader = new FileReader();
    fileReader.readAsBinaryString(template);
    fileReader.onload = () => {
        var workbook = XLSX.read(fileReader.result, { type: "binary" });
        var sheetNames = workbook.SheetNames;
        const excelData = XLSX.utils.sheet_to_json(
            workbook.Sheets[sheetNames[0]]
        );
        excelData.forEach((user) => {
            uploadedUsers.value.push(user);
        });
        router.post(route("groups.upload", props.group), uploadedUsers.value);
        uploadedUsers.value = [];
    };
};
</script>

<template>
    <header class="flex justify-between">
        <div>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Members Information
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                View users tagged as group members.
            </p>
        </div>
        <PrimaryButton class="px-4 my-2 me-2" @click.prevent="start">
            Upload
        </PrimaryButton>
        <input
            type="file"
            @change="upload($event)"
            class="hidden"
            ref="templateInput"
        />
    </header>

    <div class="mt-8 -mx-4 sm:-mx-0">
        <h1
            class="text-base leading-6 text-gray-900"
            v-if="group.users.length <= 0"
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
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in group.users">
                    <td
                        class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"
                    >
                        <span class="flex gap-2">
                            {{ user.name }}

                            <svg
                                v-if="user.deleted_at"
                                class="w-3.5 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                fill="currentColor"
                            >
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                />
                            </svg>
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
                    <td class="px-3 py-4 text-sm text-gray-500 capitalize">
                        <div
                            class="flex flex-col justify-end gap-4 gap-y-2 md:flex-row"
                        >
                            <Link
                                v-if="!user.deleted_at"
                                :href="route('users.edit', user)"
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
                                v-if="!user.deleted_at"
                                @click="destroy(user)"
                            >
                                <SecondaryButton
                                    class="text-red-700 hover:text-red-500"
                                >
                                    <svg
                                        class="w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                                        />
                                    </svg>
                                </SecondaryButton>
                            </span>
                            <span
                                v-if="user.deleted_at"
                                @click="restore(user.id)"
                            >
                                <SecondaryButton
                                    class="text-green-600 hover:text-green-500"
                                >
                                    <svg
                                        class="w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M174.7 45.1C192.2 17 223 0 256 0s63.8 17 81.3 45.1l38.6 61.7 27-15.6c8.4-4.9 18.9-4.2 26.6 1.7s11.1 15.9 8.6 25.3l-23.4 87.4c-3.4 12.8-16.6 20.4-29.4 17l-87.4-23.4c-9.4-2.5-16.3-10.4-17.6-20s3.4-19.1 11.8-23.9l28.4-16.4L283 79c-5.8-9.3-16-15-27-15s-21.2 5.7-27 15l-17.5 28c-9.2 14.8-28.6 19.5-43.6 10.5c-15.3-9.2-20.2-29.2-10.7-44.4l17.5-28zM429.5 251.9c15-9 34.4-4.3 43.6 10.5l24.4 39.1c9.4 15.1 14.4 32.4 14.6 50.2c.3 53.1-42.7 96.4-95.8 96.4L320 448v32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2v32l96.2 0c17.6 0 31.9-14.4 31.8-32c0-5.9-1.7-11.7-4.8-16.7l-24.4-39.1c-9.5-15.2-4.7-35.2 10.7-44.4zm-364.6-31L36 204.2c-8.4-4.9-13.1-14.3-11.8-23.9s8.2-17.5 17.6-20l87.4-23.4c12.8-3.4 26 4.2 29.4 17L182 241.2c2.5 9.4-.9 19.3-8.6 25.3s-18.2 6.6-26.6 1.7l-26.5-15.3L68.8 335.3c-3.1 5-4.8 10.8-4.8 16.7c-.1 17.6 14.2 32 31.8 32l32.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32.2 0C42.7 448-.3 404.8 0 351.6c.1-17.8 5.1-35.1 14.6-50.2l50.3-80.5z"
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
</template>
