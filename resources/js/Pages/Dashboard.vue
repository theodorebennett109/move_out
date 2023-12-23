<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps(["carRentals"]);
</script>

<template>
    <Head title="Dashboard" />

    <GuestLayout>
        <h2 class="my-3 text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>
        <!-- Table -->
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Customer</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Rate/Day</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Invoice No.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(carRental, index) in carRentals" :key="index">
                        <td>{{ carRental.person.name }}</td>
                        <td>{{ carRental.carModel }}</td>
                        <td>{{ carRental.ratePerDay }}</td>
                        <td>{{ carRental.total }}</td>
                        <td>{{ carRental.status }}</td>
                        <td>{{ carRental.invoiceNo }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </GuestLayout>
</template>
