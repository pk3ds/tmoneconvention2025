<script setup>
const items = [
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
    // More items...
];
</script>

<template>
    <div class="bg-white">
        <div
            class="max-w-4xl px-6 py-24 mx-auto divide-y divide-gray-900/10 sm:py-32 lg:px-8 lg:py-40"
        >
            <h2
                class="text-3xl font-bold tracking-tight text-center uppercase text-cobalt-blue font-title sm:text-4xl"
            >
                Agenda
            </h2>
            <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
                <div
                    v-for="item in items"
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
