<script setup>
const dayOne = [
    {
        id: 1,
        time: "07.00 AM",
        event: "<b>Bus departure from TM Annexe 2 / TM Campus</b>",
    },
    {
        id: 2,
        time: "09.00 AM - 10.00 AM",
        event: "<b>Arrival & Registration</b>",
    },
    {
        id: 3,
        time: "10.00 AM - 11.00 AM",
        event: "Keynote Address by <b>Shazurawati Abd Karim</b>, Executive Vice President TM One",
    },
    {
        id: 4,
        time: "11.00 AM - 11.30 AM",
        event: "<b>PWRGAME</b> Kick Off",
    },
    {
        id: 5,
        time: "11.30 AM - 13.30 AM",
        event: "<b>PWRGAME</b> Breakout Session",
    },
    {
        id: 6,
        time: "13.30 AM - 15.00 AM",
        event: "Lunch, Zuhur Prayer & Check-in",
    },
    {
        id: 7,
        time: "15.00 AM - 17.00 AM",
        event: "<b>PWRGAME</b> Breakout Session (continued)",
    },
    {
        id: 8,
        time: "17.00 AM - 17.20 AM",
        event: "Tea Break & Asar Prayer",
    },
    {
        id: 9,
        time: "17.20 AM - 20.00 AM",
        event: "Free & Easy",
    },
    {
        id: 10,
        time: "20.00 AM - 23.00 AM",
        event: "Gala Dinner<br/><b><i>“TM One Cosplay Odyssey: The Nightfall Chronicles”</i></b>",
    },
];

const dayTwo = [
    {
        id: 1,
        time: "08.00 AM - 08.30 AM",
        event: "<b>Powergizer</b>",
    },
    {
        id: 2,
        time: "08.30 AM - 09.00 AM",
        event: "Session with; <b>Amar Huzaimi Md Deris,</b> Group Chief Executive Officer TM",
    },
    {
        id: 3,
        time: "09.00 AM - 09.30 AM",
        event: "<b>PWRGAME</b> Finale",
    },
    {
        id: 4,
        time: "09.30 AM - 10.00 AM",
        event: "Tea Break",
    },
    {
        id: 5,
        time: "10.00 AM - 12.30 AM",
        event: "<b>Sharing Session: Empowering Digital Industry Towards Digital Malaysia</b><br/><br/><br/><b>• Tan Sri Dato' Soh Thian Lai,</b> President, Federation of Malaysian Manufacturers (FMM)<br/><br/><b>• Dato’ Seri Dr. Abdul Aziz Sheikh Abdul Kadir,</b> Chairman, Majlis Agama Islam Negeri Sembilan (MAINS)<br/><br/><b>• Muhammad Afhzal Abdul Rahman,</b> Chief Digital Technology Officer, Employees Provident Fund (EPF)<br/><br/><b>• Mohamad Zahri Samingon,</b> Deputy State Secretary (Management), Selangor",
    },
    {
        id: 6,
        time: "12.30 AM - 14.30 AM",
        event: "Checkout, Lunch & Zuhur Prayer",
    },
    {
        id: 7,
        time: "14.30 AM - 15.00 AM",
        event: "<b>Powergizer</b>",
    },
    {
        id: 8,
        time: "15.00 AM - 16.00 AM",
        event: "<b>Panel Discussion: Powering The Next</b><br/><br/><br/>Moderator: <b>Zamry Ibrahim,</b> General Manager, Energy Enterprise Sales<br/><br/>Panelists:<br/><b>• Noorhanida Su’ib,</b> Vice President, Product & Innovations TM One<br/><br/><b>• Mohd Zaidi Bin Mohd Basir,</b> Vice President, Business Technology TM One<br/><br/><b>• Mohamad Rejab Sulaiman,</b> Covering CEO Credence",
    },
    {
        id: 9,
        time: "16.00 AM - 16.20 AM",
        event: "Tea Break",
    },
    {
        id: 10,
        time: "16.20 AM - 16.50 AM",
        event: "Closing Remarks by <b>Shazurawati Abd Karim</b>, Executive Vice President TM One",
    },
    {
        id: 11,
        time: "16.50 AM - 17.20 AM",
        event: "Announcement of <b>Best PWRTEAM</b>",
    },
    {
        id: 12,
        time: "17.30 AM",
        event: "<b>Bus departure from Royale Chulan Seremban</b>",
    },
    {
        id: 13,
        time: "19.00 AM",
        event: "<b>Arrival at TM Annexe 2 / TM Campus</b>",
    },
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
                    class="pt-8 lg:grid lg:grid-cols-8 lg:gap-8"
                >
                    <dt
                        class="text-2xl font-bold leading-7 text-ultramarine lg:col-span-2"
                    >
                        {{ item.time }}
                    </dt>
                    <dd class="mt-4 lg:col-span-6 lg:mt-0">
                        <p
                            class="text-2xl leading-7 text-gray-900"
                            v-html="item.event"
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
                    class="pt-8 lg:grid lg:grid-cols-8 lg:gap-8"
                >
                    <dt
                        class="text-2xl font-bold leading-7 text-ultramarine lg:col-span-2"
                    >
                        {{ item.time }}
                    </dt>
                    <dd class="mt-4 lg:col-span-6 lg:mt-0">
                        <p
                            class="text-2xl leading-7 text-gray-900"
                            v-html="item.event"
                        ></p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</template>
