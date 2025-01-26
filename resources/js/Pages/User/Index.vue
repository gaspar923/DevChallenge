<script setup>
import { ref } from 'vue';
// import { Inertia } from '@inertiajs/inertia';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, createInertiaApp } from '@inertiajs/vue3';
// import Welcome from '@/Components/Welcome.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import Pagination from "@/Components/Pagination.vue";
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
// import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import { ArrowUpTrayIcon, ArrowDownTrayIcon, TrashIcon, FunnelIcon, EyeIcon, PlusIcon, PencilIcon } from '@heroicons/vue/24/solid'

import { Head, useForm, useRemember } from '@inertiajs/vue3';

const props = defineProps({
    // status: String,
    name: String,
    users: Object,
});

const form = useForm({
    name: props.name,
    // name: '',
});

const submit = () => {
    form.get(route('user.index'), {
        preserveState: true,
    });
};

const displayModalDelete = ref(false);
const selectedUser = ref(null);

const showModalDelete = (data) => {
    displayModalDelete.value = true;
    selectedUser.value = data;
    // setTimeout(() => passwordInput.value.focus(), 250);
};

const deactivate = () => {
    // form.post(route('two-factor.login'));
    // if (!confirm("Seguro que quieres eliminar el usuario: " + data.email + "?")) return;
    // Inertia.delete(route("user.destroy", { user: data }))
    // router.delete(route("user.destroy", { user: data }))
    // router.delete(route("user.destroy", { user: selectedUser.value }))
    router.post(route("user.deactivate", { user: selectedUser.value }))
    displayModalDelete.value = false;
};

const closeModalDelete = () => {
    displayModalDelete.value = false;
};

// const exportUsers = () => {
//     // router.post(route("user.deleteUser", { user: selectedUser.value }))
//     // displayModalDelete.value = false;

//     // Inertia.get('/excel/user-export', {}, {
//     //     onFinish: () => {
//     //         // Handle after download if necessary
//     //     },
//     //     preserveState: true,
//     //     preserveScroll: true,
//     // });
//     router.get(route("user.export", { }))
// };

</script>

<template>
    <AppLayout title="Usuarios">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template> -->
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200" style="color:black">
                        <!-- <pre>{{ $page.props }}</pre> -->
                        <div>
                            <Link class="btn-primary" :href="route('user.create')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Crear
                            </Link>
                        </div>
                        <form class="my-5 flex gap-4" :action="route('user.index')" @submit.prevent="submit">
                            <PrimaryButton type="button" @click="form.name = ''">
                                <FunnelIcon class="size-4" />
                            </PrimaryButton>
                            <TextInput v-model="form.name" type="text" class="mt-1 block w-full" placeholder="" />
                            <PrimaryButton>Buscar</PrimaryButton>
                        </form>
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="p-3">Id</th>
                                    <th class="p-3">Nombre</th>
                                    <th class="p-3">Email</th>
                                    <th class="p-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="u in users.data" :key="u.id">
                                    <td class="p-3 border">{{ u.id }}</td>
                                    <td class="p-3 border">{{ u.name }}</td>
                                    <td class="p-3 border">{{ u.email }}</td>
                                    <td class="p-3 border ">
                                        <Link class="btn-secondary m-1" :href="route('user.show', { user: u })">
                                        <EyeIcon class="size-4" />
                                        </Link>
                                        <Link class="btn-primary m-1" :href="route('user.edit', { user: u })">
                                        <PencilIcon class="size-4" />
                                        </Link>
                                        <DangerButton class="m-1" @click="showModalDelete(u)">
                                            <TrashIcon class="size-4" />
                                        </DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <Pagination :links="users.links" class="mt-6" />
            </div>
        </div>

        <DialogModal :show="displayModalDelete" @close="closeModalDelete">
            <template #title>
                Eliminar Usuario
            </template>

            <template #content>
                <div>
                    Seguro que quieres eliminar el usuario {{ selectedUser.email }} ?
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="closeModalDelete">
                    Cancelar
                </SecondaryButton>
                <DangerButton class="ms-3" @click="deactivate">
                    Eliminar
                </DangerButton>
            </template>
        </DialogModal>
    </AppLayout>
</template>
