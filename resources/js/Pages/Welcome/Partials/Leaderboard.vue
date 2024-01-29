<script setup>
const props = defineProps({
    leaderboards: Object,
    groups: Object,
});
</script>

<template>
    <section class="rounded-lg shadow-sm bg-chevron-02">
        <div
            id="pricing-block-5"
            class="text-center rounded-t-lg font-title background-radial-gradient"
        >
            <h2
                class="mb-12 text-3xl font-bold text-center text-white sm:text-4xl"
            >
                Top PWRTEAM
            </h2>
        </div>

        <div
            class="grid px-6 lg:grid-cols-3 md:px-12 xl:px-32"
            style="margin-top: -200px"
        >
            <!-- Gold Wide -->
            <div
                v-if="leaderboards.length >= 3"
                class="block p-0 py-12 lg:hidden"
            >
                <div class="z-10 block h-full bg-white rounded-lg shadow-lg">
                    <div
                        class="p-6 border-b border-gray-300 text-center rounded-t-lg bg-[#d4af37]"
                    >
                        <p
                            class="py-2 mb-4 text-3xl text-white uppercase bg-blue-600 rounded-lg"
                        >
                            <strong>{{ leaderboards[0].name }}</strong>
                        </p>
                        <h3 class="mb-6 text-2xl">
                            <strong>{{ leaderboards[0].points }}</strong>
                            <small class="text-sm text-gray-700"> points</small>
                        </h3>
                    </div>
                    <div class="p-6">
                        <span
                            v-for="award in leaderboards[0].awards"
                            class="flex p-4 m-4 text-sm font-semibold text-gray-500 bg-gray-200 rounded-full"
                        >
                            <svg
                                class="w-12 h-12 rounded-full max-w-none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"
                            >
                                <path
                                    d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"
                                />
                            </svg>
                            <p class="self-center">{{ award.name }}</p>
                        </span>
                        <p
                            class="text-center"
                            v-if="leaderboards[0].awards.length === 0"
                        >
                            No award received (yet..)
                        </p>
                    </div>
                </div>
            </div>

            <!-- Silver -->
            <div v-if="leaderboards.length >= 3" class="p-0 py-12">
                <div
                    class="block h-full bg-white rounded-lg shadow-lg lg:rounded-tr-none lg:rounded-br-none"
                >
                    <div
                        class="p-6 border-b border-gray-300 text-center rounded-t-lg lg:rounded-tr-none bg-[#c0c0c0]"
                    >
                        <p
                            class="py-2 mb-4 text-3xl text-white uppercase bg-blue-600 rounded-lg"
                        >
                            <strong>{{ leaderboards[1].name }}</strong>
                        </p>
                        <h3 class="mb-6 text-2xl">
                            <strong>{{ leaderboards[1].points }}</strong>
                            <small class="text-sm text-gray-700"> points</small>
                        </h3>
                    </div>
                    <div class="p-6">
                        <span
                            v-for="award in leaderboards[1].awards"
                            class="flex p-4 m-4 text-sm font-semibold text-gray-500 bg-gray-200 rounded-full"
                        >
                            <svg
                                class="w-12 h-12 rounded-full max-w-none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"
                            >
                                <path
                                    d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"
                                />
                            </svg>
                            <p class="self-center">{{ award.name }}</p>
                        </span>
                        <p
                            class="text-center"
                            v-if="leaderboards[1].awards.length === 0"
                        >
                            We are working on something ;)
                        </p>
                    </div>
                </div>
            </div>

            <!-- Gold Narrow -->
            <div v-if="leaderboards.length >= 3" class="hidden p-0 lg:block">
                <div class="z-10 block h-full bg-white rounded-lg shadow-lg">
                    <div
                        class="p-6 border-b border-gray-300 text-center rounded-t-lg bg-[#d4af37]"
                    >
                        <p
                            class="py-2 mb-4 text-3xl text-white uppercase bg-blue-600 rounded-lg"
                        >
                            <strong>{{ leaderboards[0].name }}</strong>
                        </p>
                        <h3 class="mb-6 text-2xl">
                            <strong>{{ leaderboards[0].points }}</strong>
                            <small class="text-sm text-gray-700"> points</small>
                        </h3>
                    </div>
                    <div class="p-6">
                        <span
                            v-for="award in leaderboards[0].awards"
                            class="flex p-4 m-4 text-sm font-semibold text-gray-500 bg-gray-200 rounded-full"
                        >
                            <svg
                                class="w-12 h-12 rounded-full max-w-none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"
                            >
                                <path
                                    d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"
                                />
                            </svg>
                            <p class="self-center">{{ award.name }}</p>
                        </span>
                        <p
                            class="text-center"
                            v-if="leaderboards[0].awards.length === 0"
                        >
                            No award received (yet..)
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bronze -->
            <div v-if="leaderboards.length >= 3" class="p-0 py-12">
                <div
                    class="block h-full bg-white rounded-lg shadow-lg lg:rounded-tl-none lg:rounded-bl-none"
                >
                    <div
                        class="p-6 border-b border-gray-300 text-center rounded-t-lg lg:rounded-tl-none bg-[#cd7f32]"
                    >
                        <p
                            class="py-2 mb-4 text-3xl text-white uppercase bg-blue-600 rounded-lg"
                        >
                            <strong>{{ leaderboards[2].name }}</strong>
                        </p>
                        <h3 class="mb-6 text-2xl">
                            <strong>{{ leaderboards[2].points }}</strong>
                            <small class="text-sm text-gray-700"> points</small>
                        </h3>
                    </div>
                    <div class="p-6">
                        <span
                            v-for="award in leaderboards[2].awards"
                            class="flex p-4 m-4 text-sm font-semibold text-gray-500 bg-gray-200 rounded-full"
                        >
                            <svg
                                class="w-12 h-12 rounded-full max-w-none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"
                            >
                                <path
                                    d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"
                                />
                            </svg>
                            <p class="self-center">{{ award.name }}</p>
                        </span>
                        <p
                            class="text-center"
                            v-if="leaderboards[1].awards.length === 0"
                        >
                            At least we are on the podium!
                        </p>
                    </div>
                </div>
            </div>

            <div v-if="leaderboards.length >= 3" class="p-0 py-6"></div>
        </div>
    </section>

    <div
        v-if="groups.length !== 0"
        class="mt-24 overflow-hidden bg-white rounded-lg shadow-sm"
    >
        <div class="p-6 text-gray-900">
            <p
                class="px-3 text-3xl text-center font-title sm:text-4xl text-cobalt-blue"
            >
                League Table Standings
            </p>
            <div class="flex flex-col mt-12">
                <div class="px-0 overflow-x-auto md:px-24 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-6 py-4 font-bold text-left text-gray-900 text-md"
                                        >
                                            #
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-4 font-bold text-left text-gray-900 text-md"
                                        >
                                            PWRTEAM Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-4 font-bold text-left text-gray-900 text-md"
                                        >
                                            Points
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(group, index) in groups"
                                        class="border-b"
                                        :class="
                                            index % 2 === 0
                                                ? 'bg-gray-100'
                                                : 'bg-white'
                                        "
                                    >
                                        <td
                                            class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"
                                        >
                                            {{ index + 1 }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap"
                                        >
                                            {{ group.name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap"
                                        >
                                            {{ group.points }}
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
</template>

<style>
#pricing-block-5 {
    height: 300px;
    padding-top: 55px;
}

@media (min-width: 992px) {
    #pricing-block-5 {
        height: 400px;
        padding-top: 80px;
    }
}

.background-radial-gradient {
    background-image: url("../../../../../public/images/BG-Chevron-02.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.bg-chevron-02 {
    background-image: url("../../../../../public/images/BG-Chevron-02.png");
}
</style>
