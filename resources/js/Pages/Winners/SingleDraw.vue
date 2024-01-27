<script setup>
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";

const showSpinner = ref(false);
const showWinner = ref(false);
const bounce = ref(false);
const winner = ref(null);

const startDraw = () => {
    showSpinner.value = true;

    axios
        .post(route("winners.storeSingle"))
        .then((response) => {
            winner.value = response.data;
            setTimeout(endDraw, 5000);
        })
        .catch(() => {
            showSpinner.value = false;
        });
};

const endDraw = () => {
    showSpinner.value = false;
    showWinner.value = true;
    bounce.value = true;
    setTimeout(endBounce, 2500);
};

const endBounce = () => {
    bounce.value = false;
};
</script>

<style>
body {
    background-image: url("../../../../public/images/BG-01.jpg");
    /* background-position: center; */
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
</style>

<template>
    <Head title="Lucky Draw" />

    <div class="mx-auto">
        <div v-if="!showSpinner && !showWinner" class="flex justify-center">
            <div class="pt-60">
                <div class="px-8 py-32">
                    <div class="grid items-start justify-center gap-8">
                        <div class="relative group">
                            <div
                                class="absolute -inset-0.5 bg-gradient-to-r from-accent-orange to-light-blue rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"
                            ></div>
                            <button
                                @click="startDraw"
                                class="relative flex items-center py-4 leading-none bg-black rounded-lg px-7 focus:border-none"
                            >
                                <span class="flex items-center space-x-5">
                                    <span class="text-2xl text-light-blue">
                                        Start Lucky Draw
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="showSpinner" class="flex justify-center blur">
            <div class="pt-64" role="status">
                <svg
                    aria-hidden="true"
                    class="inline mr-2 text-light-blue w-80 h-80 animate-spin fill-accent-orange"
                    viewBox="0 0 100 101"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"
                    />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill"
                    />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-if="showWinner" class="flex justify-evenly">
            <div class="pt-80">
                <span v-if="!bounce">
                    <div class="px-8">
                        <div class="grid items-center justify-center gap-8">
                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-light-orange to-light-blue rounded-lg blur opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"
                                ></div>
                                <p
                                    class="relative flex items-center py-4 leading-none rounded-lg px-7"
                                >
                                    <span
                                        class="flex flex-wrap items-center space-x-5"
                                    >
                                        <span
                                            class="text-6xl font-extrabold text-gray-800"
                                        >
                                            {{ winner.name }}
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </span>
                <span v-if="bounce">
                    <div class="px-8">
                        <div class="grid items-start justify-center gap-8">
                            <div class="relative group">
                                <div
                                    class="animate-bounce absolute -inset-0.5 bg-gradient-to-r from-light-orange to-light-blue rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"
                                ></div>
                                <p
                                    class="relative flex items-center py-4 leading-none rounded-lg animate-bounce px-7"
                                >
                                    <span
                                        class="flex flex-wrap items-center space-x-5"
                                    >
                                        <span
                                            class="text-6xl font-extrabold text-gray-800"
                                        >
                                            {{ winner.name }}
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </span>

                <span v-if="!bounce" class="flex justify-center w-full mt-12">
                    <div class="px-8">
                        <div class="grid items-start justify-center gap-8">
                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-accent-orange to-light-blue rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"
                                ></div>
                                <button
                                    @click="startDraw"
                                    class="relative flex items-center py-4 leading-none bg-black rounded-lg px-7"
                                >
                                    <span class="flex items-center space-x-5">
                                        <span class="text-2xl text-light-blue">
                                            Roll Again
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
</template>
