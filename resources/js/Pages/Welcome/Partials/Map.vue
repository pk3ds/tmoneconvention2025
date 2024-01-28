<script setup>
import Modal from "@/Components/Modal.vue";
import Station01 from "./Modals/Station01.vue";
import Station02 from "./Modals/Station02.vue";
import Station03 from "./Modals/Station03.vue";
import Station04 from "./Modals/Station04.vue";
import Station05 from "./Modals/Station05.vue";
import Station06 from "./Modals/Station06.vue";
import Station07 from "./Modals/Station07.vue";
import Station08 from "./Modals/Station08.vue";
import { ref } from "vue";

const showingModal = ref(false);
const selectedStation = ref(null);

const openModal = (location) => {
    selectedStation.value = location;
    showingModal.value = true;
};

const closeModal = () => {
    showingModal.value = false;
};
</script>

<template>
    <div class="max-w-screen-xl py-8 mx-auto">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2
                    class="text-3xl font-bold tracking-tight uppercase text-cobalt-blue font-title sm:text-4xl"
                >
                    PWRGAME
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-500">
                    Products Showcase - M Floor • Physical Challenges - G Floor
                </p>
            </div>
            <div
                class="grid max-w-2xl grid-cols-1 gap-8 mx-auto mt-8 auto-rows-fr lg:mx-0 lg:max-w-none lg:grid-cols-2"
            >
                <!-- https://github.com/pageballoon/imagemapper -->
                <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 596 585"
                >
                    <image
                        width="596"
                        height="585"
                        xlink:href="/images/PWRGame-Map-02.png"
                    ></image>

                    <a @click.prevent="openModal('01')" xlink:href="1">
                        <rect
                            x="50"
                            y="204"
                            fill="#fff"
                            opacity="0"
                            width="76"
                            height="69"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('02')" xlink:href="2">
                        <rect
                            x="43"
                            y="126"
                            fill="#fff"
                            opacity="0"
                            width="79"
                            height="67"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('03')" xlink:href="3">
                        <rect
                            x="51"
                            y="49"
                            fill="#fff"
                            opacity="0"
                            width="70"
                            height="59"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('04')" xlink:href="4">
                        <rect
                            x="318"
                            y="125"
                            fill="#fff"
                            opacity="0"
                            width="69"
                            height="81"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('05')" xlink:href="5">
                        <rect
                            x="399"
                            y="124"
                            fill="#fff"
                            opacity="0"
                            width="72"
                            height="82"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('06')" xlink:href="6">
                        <rect
                            x="365"
                            y="319"
                            fill="#fff"
                            opacity="0"
                            width="81"
                            height="70"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('07')" xlink:href="7">
                        <rect
                            x="368"
                            y="391"
                            fill="#fff"
                            opacity="0"
                            width="80"
                            height="69"
                        ></rect>
                    </a>
                    <a @click.prevent="openModal('08')" xlink:href="8">
                        <rect
                            x="368"
                            y="466"
                            fill="#fff"
                            opacity="0"
                            width="79"
                            height="67"
                        ></rect>
                    </a>
                </svg>

                <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 596 584"
                >
                    <image
                        width="596"
                        height="584"
                        xlink:href="/images/PWRGame-Map-01.png"
                    ></image>
                    <a @click.prevent="" xlink:href="13B">
                        <rect
                            x="265"
                            y="11"
                            fill="#fff"
                            opacity="0"
                            width="83"
                            height="67"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="13A">
                        <rect
                            x="436"
                            y="25"
                            fill="#fff"
                            opacity="0"
                            width="80"
                            height="71"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="12A">
                        <rect
                            x="515"
                            y="151"
                            fill="#fff"
                            opacity="0"
                            width="68"
                            height="82"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="11A">
                        <rect
                            x="444"
                            y="326"
                            fill="#fff"
                            opacity="0"
                            width="71"
                            height="77"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="12B">
                        <rect
                            x="514"
                            y="387"
                            fill="#fff"
                            opacity="0"
                            width="70"
                            height="76"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="10">
                        <rect
                            x="340"
                            y="427"
                            fill="#fff"
                            opacity="0"
                            width="71"
                            height="83"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="11B">
                        <rect
                            x="24"
                            y="490"
                            fill="#fff"
                            opacity="0"
                            width="70"
                            height="81"
                        ></rect>
                    </a>
                    <a @click.prevent="" xlink:href="9">
                        <rect
                            x="18"
                            y="326"
                            fill="#fff"
                            opacity="0"
                            width="65"
                            height="86"
                        ></rect>
                    </a>
                </svg>
            </div>
        </div>
    </div>

    <Modal :show="showingModal" @close="closeModal">
        <div class="p-6">
            <Station01
                v-if="selectedStation == '01'"
                @closeModal="closeModal"
            />
            <Station02
                v-if="selectedStation == '02'"
                @closeModal="closeModal"
            />
            <Station03
                v-if="selectedStation == '03'"
                @closeModal="closeModal"
            />
            <Station04
                v-if="selectedStation == '04'"
                @closeModal="closeModal"
            />
            <Station05
                v-if="selectedStation == '05'"
                @closeModal="closeModal"
            />
            <Station06
                v-if="selectedStation == '06'"
                @closeModal="closeModal"
            />
            <Station07
                v-if="selectedStation == '07'"
                @closeModal="closeModal"
            />
            <Station08
                v-if="selectedStation == '08'"
                @closeModal="closeModal"
            />
        </div>
    </Modal>
</template>
