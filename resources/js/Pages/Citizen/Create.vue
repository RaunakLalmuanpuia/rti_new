<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import CheckBox from "@/Components/Checkbox.vue";
import Checkbox from "@/Components/Checkbox.vue";

const form = useForm({
    department:'',
    question: "",
    file: [],
    bpl:false,
    bpl_file: [],
    life_or_death:false,
});

const submit = () => {
    form.post(route('citizen.submit.rti'), {
        onFinish: () => form.reset(),
    });
};


</script>

<template>
    <Head title="Apply" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Apply RTI</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Apply for RTI</div>


                </div>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="department" value="Department" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.department"
                            required
                            autofocus
                            autocomplete="Department"
                        />

                        <InputError class="mt-2" :message="form.errors.department" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="question" value="question" />


                        <q-editor v-model="form.question" min-height="5rem" />

                        <InputError class="mt-2" :message="form.errors.question" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="file" value="File" />


                        <q-file
                            v-model="form.file"
                            label="Pick files"
                            filled
                            multiple
                            use-chips
                        >
                            <template v-slot:prepend>
                                <q-icon name="attach_file" />
                            </template>
                        </q-file>

                        <InputError class="mt-2" :message="form.errors.file" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.bpl" />
                            <span class="ms-2 text-sm text-gray-600">BPL</span>
                        </label>
                    </div>
                    <div class="mt-4" v-if="form.bpl">
                        <InputLabel for="file" value="BPL File" />

                        <q-file
                            v-model="form.bpl_file"
                            label="Pick BPL files"
                            filled
                            multiple
                            use-chips
                        >
                            <template v-slot:prepend>
                                <q-icon name="attach_file" />
                            </template>
                        </q-file>

                        <InputError class="mt-2" :message="form.errors.bpl_file" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.life_or_death" />
                            <span class="ms-2 text-sm text-gray-600">Is Life or Death</span>
                        </label>
                    </div>

                    <div v-if="!form.bpl_file.length" class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Make Payment
                            </PrimaryButton>
                    </div>

                    <div v-if="form.bpl_file.length" class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Submit RTI
                            </PrimaryButton>
                    </div>
                </form>


            </div>
        </div>
    </AuthenticatedLayout>
</template>
