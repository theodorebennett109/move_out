<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import Nav from "@/Components/Nav.vue";
</script>

<template>
    <div>
        <Nav />
        <!-- Body -->
        <div class="p-4">
            <slot />
        </div>
    </div>
</template>
