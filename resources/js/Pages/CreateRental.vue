<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import SubmitButton from "@/Components/SubmitButton.vue";
import { computed, ref, watchEffect } from "vue";
const props = defineProps(["carRentals", "models"]);

let form = ref({
    first_name: null,
    last_name: null,
    email: null,
    tel_no: null,
    start_date: null,
    end_date: null,
    car_model: "",
    address: null,
    total: 0,
});

function submit() {
    router.post(route("store"), form);
}

const carRate = computed(
    () =>
        props.models?.filter(
            (rental) => form.value.car_model == rental.model
        )[0]?.rate
);
const calTotal = computed(
    () =>
        dateDifference(form.value.start_date, form.value.end_date) *
        carRate.value
);

function dateDifference(startDate, endDate) {
    let start = new Date(startDate);
    let end = new Date(endDate);
    var difference = end - start;
    // Calculate the difference in days, hours, minutes and seconds
    var days = Math.floor(difference / 1000 / 60 / 60 / 24);
    return days;
}

watchEffect(() => {
    if (form.value.start_date && form.value.end_date) {
        form.value.total = calTotal.value;
    }
});
</script>

<template>
    <Head title="Create Rental" />

    <DefaultLayout>
        <!-- First name -->
        <div class="flex justify-center bg-white">
            <form
                @submit.prevent="submit"
                class="flex flex-col w-full gap-6 sm:w-3/4"
            >
                <!-- Name -->
                <div class="flex flex-col gap-4 sm:flex-row">
                    <div class="w-full sm:w-1/2">
                        <label for="" class="mb-2 font-bold">First Name</label>
                        <input
                            v-model="form.first_name"
                            type="text"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>

                    <div class="w-full sm:w-1/2">
                        <label for="" class="mb-2 font-bold">Last Name</label>
                        <input
                            v-model="form.last_name"
                            type="text"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row">
                    <div class="w-full sm:w-1/2">
                        <label for="" class="mb-2 font-bold"
                            >Email Address</label
                        >
                        <input
                            v-model="form.email"
                            type="text"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>

                    <!-- number -->

                    <div class="w-full sm:w-1/2">
                        <label for="" class="mb-2 font-bold"
                            >Telephone Number</label
                        >
                        <input
                            v-model="form.tel_no"
                            type="text"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>
                </div>

                <div>
                    <div class="w-full">
                        <label for="" class="mb-2 font-bold">Address</label>
                        <input
                            v-model="form.address"
                            type="text"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>
                </div>

                <!-- Car -->
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="" class="mb-2 font-bold">Start Date</label>
                        <input
                            v-model="form.start_date"
                            type="date"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>

                    <!-- End -->

                    <div class="w-1/2">
                        <label for="" class="mb-2 font-bold">End Date</label>
                        <input
                            v-model="form.end_date"
                            type="date"
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        />
                    </div>
                </div>

                <!-- Model -->

                <div class="flex gap-4">
                    <div class="w-full sm:w-1/2">
                        <div>
                            <label for="" class="mb-2 font-bold"
                                >Car Model</label
                            >
                        </div>

                        <select
                            v-model="form.car_model"
                            type=""
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        >
                            <option value="" disabled selected>
                                Select an available car model
                            </option>
                            <option
                                v-for="(model, index) in models"
                                :key="index"
                                :value="model.model"
                            >
                                {{ model.model }}
                            </option>
                        </select>
                    </div>

                    <div class="flex items-center w-full sm:w-1/2">
                        <!-- Rate -->
                        <div v-if="carRate" class="flex font-bold">
                            <label for="" class="mb-2">Rate: &nbsp;</label>
                            <span class="text-blue-600">${{ carRate }}</span>
                        </div>
                    </div>

                    <!-- Total -->

                    <!-- End -->
                </div>

                <div v-if="carRate" class="w-full">
                    <label for="" class="mb-2 font-bold">Total</label>
                    <input
                        v-model="form.total"
                        type="text"
                        class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                    />
                </div>
                <div class="flex justify-center">
                    <SubmitButton>Submit</SubmitButton>
                </div>
            </form>
        </div>
    </DefaultLayout>
</template>
