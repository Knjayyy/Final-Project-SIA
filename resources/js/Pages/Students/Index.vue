<template>
    <AppLayout title="Students">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text"
                                class="block p-2 pl-10 w-80 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search (Course/Year Level)" @keydown.enter="search($event)">
                    </div>
                <div>
                    <Link v-if="props.auth.user.roles.includes('admin')" href="/students/create" class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2">Add Student</Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-between">
                    <div class="w-[49%] mb-4" v-for="student in students" :key="student.id">
                        <StudentCard :student="student" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import StudentCard from '@/Components/StudentCard.vue'
    import { usePage, router, Link } from '@inertiajs/vue3';
    import { computed } from 'vue'


    const props = defineProps({
        students: Array,
        auth: Object
    })

    function search(ev) {
        router.visit('/students/search/' + ev.target.value)
    }

    const page = usePage()

    const user = computed(() => page.props.auth.user)
</script>
