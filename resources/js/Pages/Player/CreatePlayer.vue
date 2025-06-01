<script setup>
import { ref } from 'vue';
import axios from 'axios';

const name = ref('');
const age = ref('');
const teamId = ref('');

const submit = async () => {
    await axios.post('/api/players', { name: name.value, age: age.value, team_id: teamId.value });
    alert('Player Created');
};
</script>

<template>
    <div>
        <h1>Create Player</h1>
        <input v-model="name" placeholder="Name" />
        <input v-model="age" placeholder="Age" type="number" />
        <input v-model="teamId" placeholder="Team ID" type="number" />
        <button @click="submit">Create</button>
    </div>
</template>
