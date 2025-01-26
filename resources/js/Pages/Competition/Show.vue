<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';

defineProps({
    competition: Object,
});
</script>

<template>
    <!-- <Head title="Detalle Liga" /> -->

    <AppLayout title="Detalle Liga">
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" class="flex flex-col gap-2">
                            <div>
                                <InputLabel :value="'Nombre: ' + competition.name" />
                            </div>
                            <div>
                                <InputLabel :value="'Código: ' + competition.code" />
                            </div>
                            <div>
                                <InputLabel :value="'Plan: ' + competition.plan" />
                            </div>
                            <div>
                                <InputLabel :value="'Tipo: ' + competition.type" />
                            </div>
                            <div>
                                <InputLabel
                                    :value="'Número de temporadas disponibles: ' + competition.number_of_available_seasons" />
                            </div>
                            <div v-if="competition.emblem">
                                <InputLabel :value="'Emblema: '" />
                                <img class="h-36" :src="competition.emblem" alt="file" srcset="">
                            </div>
                            <!-- <div>
                                <InputLabel :value="'Descripción: '" />
                                <p class="whitespace-pre-wrap">{{ competition.description }}</p>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
