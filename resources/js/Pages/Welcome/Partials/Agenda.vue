<script setup>
const dayOne = [
    {
        id: 1,
        question: "11.00 AM",
        answer: "<b>Registration & Arrival of guests<br/>Refreshments</b>",
    },
    {
        id: 2,
        question: "11.30 AM",
        answer: "<b>Registration & Arrival of guests<br/></b>Amar Huzaimi Md Deris, Group Chief Executive Officer, TM ",
    },
    // More dayOne...
];

const dayTwo = [
    {
        id: 1,
        question: "10.00 AM",
        answer: "<b>Registration & Arrival of guests<br/>Refreshments</b>",
    },
    {
        id: 2,
        question: "10.30 AM",
        answer: "<b>Registration & Arrival of guests<br/></b>Amar Huzaimi Md Deris, Group Chief Executive Officer, TM ",
    },
    // More dayTwo...
];
</script>

<template>
    <div class="pt-24 bg-white">
        <h2
            class="text-3xl font-bold tracking-tight text-center uppercase mb-14 text-cobalt-blue font-title sm:text-4xl"
        >
            Agenda
        </h2>
        <p
            class="mt-2 text-lg leading-8 text-center uppercase text-ultramarine font-title"
        >
            Day 1 - 29<sup>th</sup> January 2024
        </p>
        <div
            class="max-w-4xl px-6 pb-24 mx-auto divide-y divide-gray-900/10 sm:pb-32 lg:px-8 lg:pb-40"
        >
            <dl class="space-y-8 divide-y divide-gray-900/10">
                <div
                    v-for="item in dayOne"
                    :key="item.id"
                    class="pt-8 lg:grid lg:grid-cols-6 lg:gap-8"
                >
                    <dt
                        class="text-2xl font-bold leading-7 text-ultramarine lg:col-span-1"
                    >
                        {{ item.question }}
                    </dt>
                    <dd class="mt-4 lg:col-span-5 lg:mt-0">
                        <p
                            class="text-2xl leading-7 text-gray-900"
                            v-html="item.answer"
                        ></p>
                    </dd>
                </div>
            </dl>
        </div>

        <p
            class="mt-2 text-lg leading-8 text-center uppercase text-ultramarine font-title"
        >
            Day 2 - 30<sup>th</sup> January 2024
        </p>
        <div
            class="max-w-4xl px-6 pb-24 mx-auto divide-y divide-gray-900/10 sm:pb-32 lg:px-8 lg:pb-40"
        >
            <dl class="space-y-8 divide-y divide-gray-900/10">
                <div
                    v-for="item in dayTwo"
                    :key="item.id"
                    class="pt-8 lg:grid lg:grid-cols-6 lg:gap-8"
                >
                    <dt
                        class="text-2xl font-bold leading-7 text-ultramarine lg:col-span-1"
                    >
                        {{ item.question }}
                    </dt>
                    <dd class="mt-4 lg:col-span-5 lg:mt-0">
                        <p
                            class="text-2xl leading-7 text-gray-900"
                            v-html="item.answer"
                        ></p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</template>
