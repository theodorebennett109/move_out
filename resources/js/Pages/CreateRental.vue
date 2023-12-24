<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps(["carRentals"]);
</script>

<template>
    <Head title="Create Rental" />

    <GuestLayout>
        <h2 class="my-3 text-xl font-semibold leading-tight text-gray-800">
            Create Rental Request
        </h2>
    </GuestLayout>
</template>
