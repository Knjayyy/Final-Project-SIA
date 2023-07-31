<template>
    <AppLayout title="Edit Student Info">
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-200 leading-tight">Edit Student Info</h2>
                <Link class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2" as="button" :href="'/students/' + student.id">Back</Link>
            </div>
        </template>

        <div class="py-6">
            <div class="bg-white max-w-4xl p-4 mx-auto rounded-lg border">
            <form @submit.prevent="submit" class="flex flex-wrap">
                <div class="w-full md:w-1/2 px-2">
                <h4 class="text-xl mb-4">Student Info</h4>

                        <div class="form-field">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" v-model="form.first_name" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="mid_name">Middle name</label>
                            <input type="text" id="mid_name" v-model="form.mid_name" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" v-model="form.last_name" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" v-model="form.birthdate" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="age">Age</label>
                            <input type="number" id="age" v-model="form.age" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="address">Address</label>
                            <input type="text" id="address" v-model="form.address" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="num">Phone no.</label>
                            <input type="tel" id="num" v-model="form.num" class="input-field" />
                        </div>
                        </div>
                        <div class="w-full md:w-1/2 px-2">
                        <h4 class="text-xl mb-4">Course Info</h4>

                        <div class="form-field">
                            <label for="course">Course</label>
                            <select id="course" v-model="form.course" class="input-field">
                                <option value="" disabled selected>Select a Course</option>
                                <option v-for="course in courses" :key="course" :value="course">{{ course }}</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="year_level">Year Level</label>
                            <input type="number" id="year_level" v-model="form.year_level" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" v-model="form.email" class="input-field" />
                        </div>

                        <div class="mt-auto flex justify-end">
                            <button class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2" type="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';

    const props = defineProps({
        student: Object
    })

    const form = useForm({
        last_name: props.student.last_name,
        mid_name: props.student.mid_name,
        first_name: props.student.first_name,
        birthdate: props.student.birthdate,
        age: props.student.age,
        address: props.student.address,
        num: props.student.num,
        course: props.student.course,
        year_level: props.student.year_level,
        email: props.student.email,
    })

    const courses = ["BSIT", "BSIS", "BSCS", "CABM", "CRIM"];

    function submit() {
        form.patch('/students/' + props.student.id)
    }
</script>
