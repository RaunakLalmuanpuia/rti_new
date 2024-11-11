<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
});

</script>

<template>
    <Head title="Citizen Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Citizen Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Citizen Dashboard</div>

<!--                    <div class="p-6 text-gray-900">Apply for RTI</div>-->

                </div>
                <Link
                    :href="route('citizen.file_rti')"
                >
                    <PrimaryButton class="ms-4" >
                        Apply for RTI
                    </PrimaryButton>
                </Link>


            </div>
        </div>
    </AuthenticatedLayout>
</template>
