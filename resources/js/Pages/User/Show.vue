<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
// import Welcome from '@/Components/Welcome.vue';
import { Head, useForm, useRemember } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    // status: String,
    user: Object,
    // errors: Object,
    // role: String,
});
</script>

<template>

    <!-- <Head title="Crear Usuario" /> -->

    <AppLayout title="User">
        <template #header>
            <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                User
            </h2> -->
        </template>

        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel :value="'Nombre: ' + user.name" />
                            </div>
                            <div>
                                <InputLabel :value="'Email: ' + user.email" />
                            </div>
                            <!-- <pre>
                                {{ $page }}
                            </pre> -->
                            <div>
                                <InputLabel :value="'Rol: ' + user.roles[0].name" />
                                <!-- <InputLabel :value="'Rol: ' + role" /> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
