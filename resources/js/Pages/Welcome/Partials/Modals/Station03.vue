<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const emit = defineEmits(["closeModal"]);

const close = () => {
    emit("closeModal");
};
</script>

<template>
    <h2 class="text-lg font-medium text-gray-900 font-title dark:text-gray-100">
        PWRSTATION 03: Cybersecurity: Managed XDE & Managed SOC
    </h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        1. MXDR (Managed Extended Detection & Response) is the evolution of end
        point protection from EPP, EDR to XDR. Primary function of XDR : (XDR)
        augments time-to-detect and time-to-respond, minimising the risks and
        impact of threats. Threat protection features : Prevention, Re-time
        Detection, Automoted Response and Investigation & Response
    </p>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        2. MSOC (Managed Security Operation Centre) function as a comprehensive
        solution that manages complex IT security issues and enhancing security
        posture on both organizational and technical level. The main component
        in MSOC : PEOPLE, PROCESSES & TECHNOLOGY. The PEOPLE consist of
        Dedicated SOCs, skilled experts uncluding SOC Analyst Level 1 & 2 and
        Computer Security Incident Response Team (CSIRT). The PROCESS consist of
        Escalation & SLA . The TECHNOLOGY is SIEM (SECURITY INCIDENT EVENT
        MANAGEMENT). SIEM function is to recognize and address potential
        security threats and vulnerabilities before they have a chance to
        disrupt business operations and detect user anomalies and via artificial
        intelligence (AI) to automate manual processes associated with threat
        detection and incident response and provide real- time alert on security
        incidents
    </p>

    <div class="flex justify-between mt-6">
        <a href="https://forms.gle/qEXzT23V56Y1mD1i7" target="_blank">
            <PrimaryButton> Quiz </PrimaryButton>
        </a>
        <SecondaryButton @click="close"> Close </SecondaryButton>
    </div>
</template>
