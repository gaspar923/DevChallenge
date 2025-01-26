<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    links: Object,
});
</script>
<!-- <template>
    <div>
        <Component :is="link.url ? 'Link' : 'span'" v-for="link in links" :href="link.url" v-html="link.label"
            class="px-1" :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }" />
    </div>
</template> -->
<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label" />
                <Link
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url !== null ? link.url : ''">
                {{ link.label }}
                </Link>
                <!-- <Link class="btn-primary" :href="route('user.create')"/> -->
                <!-- <inertia-link v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" /> -->
            </template>
        </div>
    </div>
</template>