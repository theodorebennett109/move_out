<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { computed } from "vue";
const props = defineProps(["carRentals"]);

// console.log(props.carRentals);
function formatNumber(value) {
    // Format the number with two decimal places and a comma as a thousands separator
    return Number(value).toLocaleString("en-US", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });
}

function formatDate(dateString) {
    const options = { month: "short", day: "numeric", year: "numeric" };
    return new Date(dateString).toLocaleDateString("en-US", options);
}

function dateDifference(startDate, endDate) {
    let start = new Date(startDate);
    let end = new Date(endDate);
    var difference = end - start;
    // Calculate the difference in days, hours, minutes and seconds
    var days = Math.floor(difference / 1000 / 60 / 60 / 24);
    return days;
}
</script>

<template>
    <Head title="Dashboard" />

    <DefaultLayout>
        <h2 class="my-3 text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>
        <div>
            <a href="/create">
                <PrimaryButton> Add Car Rental </PrimaryButton>
            </a>
        </div>

        <!-- Table -->
        <div class="border rounded-md">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Customer</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Rate/Day</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody v-if="carRentals && carRentals.length">
                    <tr v-for="(carRental, index) in carRentals" :key="index">
                        <td>
                            <p
                                class="text-blue-600 cursor-pointer hover:underline"
                                data-bs-toggle="dropdown"
                            >
                                {{ carRental.first_name }}
                                {{ carRental.last_name }}
                            </p>

                            <div
                                class="p-2 text-xs font-semibold dropdown-menu"
                                style="max-width: 200px"
                            >
                                <p class="text-sm text-center">
                                    {{ carRental.first_name }}
                                    {{ carRental.last_name }}
                                </p>
                                <hr class="my-2" />
                                <div>
                                    <div class="my-2">
                                        <p class="text-sm">Email:</p>
                                        <span class="text-blue-600">{{
                                            carRental.email
                                        }}</span>
                                    </div>

                                    <div class="my-2">
                                        <p class="text-sm">Phone Number:</p>
                                        <span class="text-blue-600">{{
                                            carRental.tel_no
                                        }}</span>
                                    </div>
                                    <div class="my-2">
                                        <p class="text-sm">Address:</p>
                                        <span class="text-blue-600">{{
                                            carRental.address
                                        }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>{{ carRental.car_model.model }}</td>
                        <td v-if="carRental.start_date">
                            {{ formatDate(carRental.start_date) }}
                        </td>
                        <td v-if="carRental.end_date">
                            {{ formatDate(carRental.end_date) }}
                        </td>

                        <td>{{ carRental.car_model.rate }}</td>
                        <td>
                            {{ carRental.total }}
                        </td>

                        <td>
                            <p
                                v-if="carRental.status == null"
                                class="inline-flex items-center gap-1 px-2 py-1 text-xs font-extrabold text-yellow-500 bg-yellow-100 rounded-full"
                            >
                                Pending
                                <span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-clock-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"
                                        />
                                    </svg>
                                </span>
                            </p>
                            <p
                                v-if="carRental.status == 1"
                                class="inline-flex items-center gap-1 px-2 py-1 text-xs font-extrabold text-green-600 bg-green-100 rounded-full"
                            >
                                Approved
                                <span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-check2"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"
                                        />
                                    </svg>
                                </span>
                            </p>
                            <p
                                v-if="carRental.status == 3"
                                class="inline-flex items-center gap-1 px-2 py-1 text-xs font-extrabold text-blue-600 bg-blue-100 rounded-full"
                            >
                                Completed
                                <span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-person-fill-check"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"
                                        />
                                        <path
                                            d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"
                                        />
                                    </svg>
                                </span>
                            </p>
                        </td>
                        <td>{{ carRental.invoice_no }}</td>

                        <td>{{ carRental.invoice_no }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DefaultLayout>
</template>
