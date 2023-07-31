<template>
    <AppLayout title="Add Student">
      <template #header>
        <div class="flex">
          <h2 class="flex-1 font-semibold text-xl text-gray-200 leading-tight">Add Student</h2>
          <Link
            class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2"
            as="button"
            href="/students"
          >
            Back
          </Link>
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

              <div class="form-field">
                <label for="img">Student Image</label>
                <input type="file" @input="handleImageChange" class="input-field" accept="image/jpeg" />
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                  {{ form.progress.percentage }}%
                </progress>
              </div>

              <div v-if="form.img" class="mt-4">
                <h4 class="text-xl mb-2">Image Preview</h4>
                <img :src="imgPreviewUrl" alt="Image Preview" class="w-40 h-40 object-cover border" />
              </div>

              <div class="mt-auto flex justify-end">
                <button class="bg-cyan-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent rounded mb-2" type="submit">Add Student</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Link, useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  const form = useForm({
    last_name: '',
    mid_name: '',
    first_name: '',
    birthdate: '',
    age: '',
    address: '',
    num: '',
    course: '',
    year_level: '',
    email: '',
    img: '',
  });

  const courses = ["BSIT", "BSIS", "BSCS", "CABM", "CRIM"];
  const imgPreviewUrl = ref(null);

  function handleImageChange(event) {
    const file = event.target.files[0];
    form.img = file;
    imgPreviewUrl.value = URL.createObjectURL(file);
  }

  function submit() {
    form.post('/students/');
  }
  </script>

  <style>
  .input-field {
    border: 1px solid #e2e8f0;
    padding: 0.5rem;
    width: 100%;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
  }

  .w-40 {
    width: 10rem;
  }

  .h-40 {
    height: 10rem;
  }
  </style>
