<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    subject: '',
    message: ''
})

const submit = () => {
    form.post('/admin/email')

    form.subject = ''
    form.message = ''
}

const props = defineProps({
    message: Object,
    auth: Object
})

</script>

<template>
  <Head title="Admin" />

  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin</h2>
    </template>

    <div class="max-w-sm mx-auto mt-4">
      <div class="bg-white shadow-md rounded p-4">
        <h1 class="text-2xl text-center mb-10">Bulk mail</h1>
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Subject:</label>
            <input v-model="form.subject" type="text" id="subject" class="w-full border-gray-300 rounded-sm px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
          </div>
          <div class="mb-4">
            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
            <textarea v-model="form.message" type="text" id="message" class="w-full border-gray-300 rounded-sm px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
          </div>
          <div class="text-right" v-if="props.auth.user.roles.includes('admin')">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Send mail
            </button>
          </div>
        </form>
      </div>
    </div>
  </AppLayout>
</template>
