<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';

defineProps({
    team: Object,
});
</script>

<template>
    <AppLayout title="Detalle del Equipo">
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" class="flex flex-col gap-2">
                            <div>
                                <InputLabel :value="'Nombre: ' + team.name" />
                            </div>
                            <div>
                                <InputLabel :value="'Nombre corto: ' + team.shortName" />
                            </div>
                            <div>
                                <InputLabel :value="'Dirección: ' + team.address" />
                            </div>
                            <div>
                                <InputLabel :value="'Año de fundación: ' + team.founded" />
                            </div>
                            <div>
                                <InputLabel :value="'Lugar: ' + team.venue" />
                            </div>
                            <div>
                                <InputLabel :value="'Tla: ' + team.tla" />
                            </div>
                            <div>
                                <InputLabel :value="'Sitio web: ' + team.website" />
                            </div>
                            <div>
                                <InputLabel :value="'Colores del club: ' + team.club_colors" />
                            </div>
                            <div v-if="team.crest">
                                <InputLabel :value="'Emblema: '" />
                                <img class="h-36" :src="team.crest" alt="file" srcset="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
