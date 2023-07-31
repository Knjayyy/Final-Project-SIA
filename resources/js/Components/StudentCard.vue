<template>
    <div class="rounded-lg p-4 border-2 border-blue-400 bg-cyan-100 shadow flex hover:bg-cyan-300">
        <div class="cursor-pointer flex flex-1">
            <div class="w-[160px] h-[160px] border flex justify-center items-center bg-gray-200 text-center">
                <img :src="student.picUrl" alt="student Image" class="aspect-square">
            </div>
            <div class="ml-4 flex-1"  @click="open(student)">
                <h3 class="font-bold">
                    {{ student.course }} - {{ student.year_level  }}
                </h3>
                <hr>
                <div class="text-2xl">{{ student.last_name}}, {{ student.first_name }} {{ student.mid_name }}</div>
                <div class="italic">{{ student.birthdate }}, {{ student.age }} years old</div>
                <div class="italic">{{ student.address }}</div>
                <div class="italic">+{{ student.num }}</div>
                <div class="italic">{{ student.email }}</div>
            </div>
            <div v-if="$page.props.auth.user.roles.includes('admin')" class="flex justify-between">
                <div>&nbsp;</div>
                <label :for="'status-' + student.id" class="switch">
                    <input type="checkbox" :id="'status-' + student.id" :checked="student.scholar" @change="toggleActive(student)">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { router } from '@inertiajs/vue3';
    import { computed } from 'vue'


    const props = defineProps({
        student: Object,
    })

    function open(student) {
        router.visit('/students/' + student.id)
    }

    function toggleActive(student) {
        router.visit('/students/toggle/' + student.id, {
            method: 'post',
            preserveScroll: true
        })
    }

</script>

<style scoped>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(16px);
        -ms-transform: translateX(16px);
        transform: translateX(16px);
    }

    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
