<script setup>
import { ref, onMounted, onUnmounted } from "vue";

const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);
const intervalId = ref(null);

const calculateTimeLeft = () => {
    const targetDate = new Date("2025-01-14 07:00:00").getTime();
    const now = new Date().getTime();
    const difference = targetDate - now;

    if (difference > 0) {
        days.value = Math.floor(difference / (1000 * 60 * 60 * 24));
        hours.value = Math.floor(
            (difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        minutes.value = Math.floor(
            (difference % (1000 * 60 * 60)) / (1000 * 60)
        );
        seconds.value = Math.floor((difference % (1000 * 60)) / 1000);
    }
};

onMounted(() => {
    calculateTimeLeft();
    intervalId.value = setInterval(calculateTimeLeft, 1000);
});

onUnmounted(() => {
    if (intervalId.value) clearInterval(intervalId.value);
});
</script>

<template>
    <div class="relative px-6 bg-white isolate py-14 lg:px-8">
        <div class="max-w-2xl py-12 mx-auto">
            <div class="text-center">
                <h1
                    class="my-6 text-2xl tracking-tight text-gray-900 uppercase font-title sm:text-4xl"
                >
                    TM One Convention 2025 <br />
                    Countdown
                </h1>
                <div class="flex items-center justify-center gap-8 p-4">
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-[#FF5E00]">{{
                            days
                        }}</span>
                        <span class="text-lg text-[#FF5E00]">Days</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-[#FF5E00]">{{
                            hours
                        }}</span>
                        <span class="text-lg text-[#FF5E00]">Hours</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-[#FF5E00]">{{
                            minutes
                        }}</span>
                        <span class="text-lg text-[#FF5E00]">Mins</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-[#FF5E00]">{{
                            seconds
                        }}</span>
                        <span class="text-lg text-[#FF5E00]">Secs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
