<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const players = ref([]);

onMounted(async () => {
    let response = await axios.get('/api/players');
    players.value = response.data;
});
</script>

<template>
    <div>
        <h1 class="text-xl font-bold">Players</h1>
        <ul>
            <li v-for="player in players" :key="player.id">
                {{ player.name }} ({{ player.age }} years old)
            </li>
        </ul>
    </div>
</template>
