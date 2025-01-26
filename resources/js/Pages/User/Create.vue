<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
// import Welcome from '@/Components/Welcome.vue';
import { Head, useForm, useRemember } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ActionMessage from '@/Components/ActionMessage.vue';

defineProps({
    // status: String,
    // users: String,
    // errors: Object,
    roles: Object,
});

const form = useForm({
    name: '',
    email: '',
    password: '',

    role: '',
});

const submit = () => {
    form
        // .transform((data) => ({
        //     ...data,
        //     remember: data.remember ? 'on' : '',
        // }))
        .post(route('user.store'), {
            // preserveState: true,(default when is post,put,patch,delete)
            //   preserveState: 'errors',
            //   preserveScroll: true,
            //   preserveScroll: 'errors',
            //   onSuccess: () => form.reset('password'),
            //   onBefore: (visit) => { },
            //   onStart: (visit) => { },
            //   onProgress: (progress) => { },
            //   onError: (errors) => { },
            //   onCancel: () => { },
            //   onFinish: visit => { },
            // onSuccess: () => {
            //     return Promise.all([
            //         this.doThing(),
            //         this.doAnotherThing()
            //     ])
            // },
            // onFinish: visit => {
            //     // This won't be called until doThing()
            //     // and doAnotherThing() have finished.
            // },
        });
};

// const cleanForm = () => {
//     form.name = "";
//     form.email = "";
//     form.password = "";
// }

// To save local component state to the history state
// const form = useRemember({
//   first_name: null,
//   last_name: null,
// }, `Users/Edit:${props.user.id}`)

// // Clear all errors...
// form.clearErrors()

// // Clear errors for specific fields...
// form.clearErrors('field', 'anotherfield')

// // Set a single error...
// form.setError('field', 'Your error message.');

// // Set multiple errors at once...
// form.setError({
//   foo: 'Your error message for the foo field.',
//   bar: 'Some other error for the bar field.'
// });

// // Reset the form...
// form.reset()

// // Reset specific fields...
// form.reset('field', 'anotherfield')

// // Set the form's current values as the new defaults...
// form.defaults()

// // Update the default value of a single field...
// form.defaults('email', 'updated-default@example.com')

// // Update the default value of multiple fields...
// form.defaults({
//   name: 'Updated Example',
//   email: 'updated-default@example.com',
// })

// // To cancel a form submission, use the cancel() method.
// form.cancel()
</script>

<template>

    <!-- <Head title="Crear Usuario" /> -->

    <AppLayout title="User">
        <template #header>
            <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2> -->
        </template>

        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel value="Nombre" />
                                <TextInput v-model="form.name" type="text" class="mt-1 block w-full" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div>
                                <InputLabel value="Email" />
                                <TextInput v-model="form.email" type="email" class="mt-1 block w-full" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div>
                                <InputLabel value="Contraseña" />
                                <TextInput v-model="form.password" type="password" class="mt-1 block w-full" />
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>
                            <div>
                                <InputLabel value="Rol" />
                                <select v-model="form.role" class="form-select mt-1 block w-full">
                                    <!-- <option v-for="option in roles" :value="option.id"> -->
                                    <option v-for="option in roles" :value="option.id" :key="option.id">
                                        {{ option.name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.role" />
                            </div>

                            <!-- <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress> -->
                            <!-- <div v-if="form.isDirty">There are unsaved form changes.</div> -->

                            <div class="flex items-center mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Guardar
                                </PrimaryButton>
                                <ActionMessage :on="form.recentlySuccessful" class="ms-3">
                                    Guardado.
                                </ActionMessage>
                                <!-- <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                    type="button" @click="cleanForm">
                                    Limpiar
                                </PrimaryButton> -->
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
