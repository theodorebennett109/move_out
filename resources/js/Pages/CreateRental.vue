<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import SubmitButton from "@/Components/SubmitButton.vue";
const props = defineProps(["carRentals"]);

let form = {
    first_name: null,
    last_name: null,
    email: null,
    tel_no: null,
    start_date: null,
    end_date: null,
    car_model: null,
};

function submit() {
    router.post(route("store"), form);
}
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
                            name="text "
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

                <div class="flex">
                    <div class="col-lg-4">
                        <label for="" class="mb-2 font-bold">Car Model</label>
                        <select
                            v-model="form.car_model"
                            type=""
                            class="w-full h-12 px-3 font-medium rounded sm:h-16 text focus:ring-0"
                        >
                            <option value="optionA">Car A</option>
                            <option value="optionB">Car B</option>
                            <option value="optionC">Car C</option>
                            <option value="optionD">Car D</option>
                        </select>
                    </div>

                    <!-- End -->
                </div>
                <div class="flex justify-center">
                    <SubmitButton>Submit</SubmitButton>
                </div>
            </form>
        </div>
    </DefaultLayout>
</template>
