<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';

defineProps({
    player: Object,
});
</script>

<template>
    <AppLayout title="Detalle del Jugador">
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" class="flex flex-col gap-2">
                            <div>
                                <InputLabel :value="'Nombre: ' + player.name" />
                            </div>
                            <div>
                                <InputLabel :value="'Fecha de nacimiento: ' + player.date_of_birth" />
                            </div>
                            <div>
                                <InputLabel :value="'Nacionalidad: ' + player.nationality" />
                            </div>
                            <div>
                                <InputLabel :value="'Posición: ' + player.position" />
                            </div>
                            <div>
                                <InputLabel :value="'Numero de camiseta: ' + player.shirt_number" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
