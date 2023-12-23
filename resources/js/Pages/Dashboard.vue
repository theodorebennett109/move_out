<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <GuestLayout>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>
    </GuestLayout>
</template>
