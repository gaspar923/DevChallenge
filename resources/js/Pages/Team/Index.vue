<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import { ArrowUpTrayIcon, ArrowDownTrayIcon, TrashIcon, FunnelIcon, EyeIcon } from '@heroicons/vue/24/solid'

const props = defineProps({

});

const teams = ref([]);
const teamsLinks = ref([]);
const teamsCurrentPage = ref(0);

const input_name = ref('');

const getTeams = (page) => {
    axios.get('/api/team', {
        params: {
            page: page,
            name: input_name.value,
        }
    }).then(response => {
        // console.log(response.data.data);

        const data = response.data.data;
        const links = response.data.links;
        const current_page = response.data.current_page;

        teams.value = data;
        teamsLinks.value = links;
        teamsCurrentPage.value = current_page;

    }).catch(error => {
        console.error('Error:', error);
    });
};

getTeams(1);
</script>

<template>
    <AppLayout title="Lista de Equipos">
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200" style="color:black">
                        <form class="my-5 flex gap-4" action='#' @submit.prevent="">
                            <PrimaryButton type="button" @click="input_name = ''">
                                <FunnelIcon class="size-4" />
                            </PrimaryButton>
                            <TextInput v-model="input_name" type="text" class="mt-1 block w-full" placeholder="" />
                            <PrimaryButton @click="getTeams(1)">Buscar</PrimaryButton>
                        </form>
                        <table class="table w-full text-center">
                            <thead>
                                <tr>
                                    <th class="">Id</th>
                                    <th class="">Nombre</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="u in teams" :key="u.id">
                                    <td class="border">{{ u.id }}</td>
                                    <td class="border">{{ u.name }}</td>
                                    <td class="border ">
                                        <Link class="btn-primary m-1" :href="route('team.show', { team: u })">
                                        <EyeIcon class="size-4" />
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-if="teamsLinks.length > 3" class="mt-4">
                    <div class="flex flex-wrap -mb-1">
                        <template v-for="(link, i) in teamsLinks" :key="link">
                            <div v-if="i == 0">
                                <button
                                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-200 hover:text-indigo-500 focus:border-indigo-500 focus:text-indigo-500"
                                    :class="{ 'bg-blue-700 text-white': link.active }"
                                    @click="link.url !== null ? getTeams(teamsCurrentPage - 1) : ''">
                                    Anterior
                                </button>
                            </div>
                            <div v-else-if="i == teamsLinks.length - 1">
                                <button
                                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-200 hover:text-indigo-500 focus:border-indigo-500 focus:text-indigo-500"
                                    :class="{ 'bg-blue-700 text-white': link.active }"
                                    @click="link.url !== null ? getTeams(teamsCurrentPage + 1) : ''">
                                    Siguiente
                                </button>
                            </div>
                            <div v-else-if="i == 1 ||
                                i == teamsLinks.length - 2 ||
                                link.label == teamsCurrentPage ||
                                link.label == teamsCurrentPage + 1 ||
                                link.label == teamsCurrentPage - 1">
                                <button
                                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-200 hover:text-indigo-500 focus:border-indigo-500 focus:text-indigo-500"
                                    :class="{ 'bg-blue-700 text-white': link.active }"
                                    @click="link.url !== null ? getTeams(link.label) : ''">
                                    {{ link.label }}
                                </button>
                            </div>
                            <div v-else-if="
                                link.label == teamsCurrentPage + 2 ||
                                link.label == teamsCurrentPage - 2">
                                ...
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>