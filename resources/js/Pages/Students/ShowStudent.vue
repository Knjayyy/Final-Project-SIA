<template>
    <AppLayout title="Students">
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-200 leading-tight">student Details</h2>
                <Link :href="'/students/email/' + student.id" class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2 mr-2" v-if="$page.props.auth.user.roles.includes('admin')">Send Email</Link>
                <Link class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2" as="button" :href="'/students/'">Back</Link>
            </div>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cyan-100 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex">
                        <div class="w-[400px] h-[400px] border flex justify-center items-center">
                            <img :src="student.picUrl" alt="student Image" class="aspect-square">
                        </div>
                        <div class="flex-1 ml-4">
                            <div class="flex">
                                <h3 class="text-2xl flex-1">{{ student.last_name }}, {{ student.first_name }} {{ student.mid_name }}</h3>
                                <div v-if="props.auth.user.roles.includes('admin')">
                                    <Link class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2 mr-2" :href="'/students/' + student.id" method="delete" as="button">Delete</Link>
                                    <Link class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2" :href="'/students/edit/' + student.id" as="button">Edit</Link>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-4">Birthdate: {{ student.birthdate }}</div>
                            <div class="mt-4">Age: {{ student.age }}</div>
                            <div class="mt-4">Address: {{ student.address }}</div>
                            <div class="mt-4">Phone no.: {{ student.num }}</div>
                            <div class="mt-4">Course and Year Level: {{ student.course }} - {{ student.year_level }}</div>
                            <div class="mt-4">Email: {{ student.email }}</div>
                            <div class="mt-4" v-if="student.scholar">
                                Scholar: <bold class="text-green-500"> Yes </bold>
                            </div>
                            <div class="mt-4" v-else>
                                Scholar: <bold class="text-red-500"> No </bold>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue'

    const props = defineProps({
        student: Object,
        auth: Object
    })

    const page = usePage()

    const user = computed(() => page.props.auth.user)
</script>
