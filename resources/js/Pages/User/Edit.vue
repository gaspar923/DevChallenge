<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
// import Welcome from '@/Components/Welcome.vue';
import { Head, useForm, useRemember, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ActionMessage from '@/Components/ActionMessage.vue';

const props = defineProps({
    // status: String,
    user: Object,
    // errors: Object,
    roles: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    password: '',
    // avatar: '',
    role: props.user.roles[0].id,
});

const submit = () => {
    // form.put(route('user.update', props.user), {});
    // console.log(form);
    form.post(route('user.update', props.user), {});
    // router.post(`/users/${user.id}`, {
    //     _method: 'put',
    //     avatar: form.avatar,
    // })
    // router.post(`/users/${user.id}`, {
    //     _method: 'put',
    //     avatar: form.avatar,
    // })
};

// const deleteAvatar = () => {
//     if (!confirm("Seguro que quieres eliminar el avatar ?")) return;
//     router.delete(route("user.deleteAvatar", props.user))
// };

</script>

<template>

    <!-- <Head title="Crear Usuario" /> -->

    <AppLayout title="User">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                User
            </h2>
        </template>

        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <!-- <InputLabel for="name" value="Nombre" />
                                <TextInput id="name" v-model="form.name" type="email" class="mt-1 block w-full" -->
                                <InputLabel value="Nombre" />
                                <TextInput v-model="form.name" type="text" class="mt-1 block w-full" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div>
                                <InputLabel value="Email" />
                                <TextInput v-model="form.email" type="email" class="mt-1 block w-full" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <!-- <pre>
                                {{ $page }}
                            </pre> -->
                            <div>
                                <InputLabel value="Rol" />
                                <select v-model="form.role" class="form-select mt-1 block w-full">
                                    <option v-for="option in roles" :value="option.id" :key="option.id">
                                        {{ option.name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.role" />
                            </div>
                            <div>
                                <InputLabel value="Contraseña" />
                                <TextInput v-model="form.password" type="password" class="mt-1 block w-full" />
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <!-- <pre>{{ user }}</pre> -->
                            <!-- <div v-if="user.profile_photo_path">
                                <img :src="user.profile_photo_url" :alt="user.name" srcset="" class="w-40 my-3">
                                <DangerButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                    @click="deleteAvatar">
                                    Eliminar Avatar
                                </DangerButton>
                            </div> -->
                            <!-- <div>
                                <input type="file" @input="form.avatar = $event.target.files[0]" />
                            </div> -->
                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Enviar
                                </PrimaryButton>
                                <ActionMessage :on="form.recentlySuccessful" class="ms-3">
                                    Guardado.
                                </ActionMessage>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
