<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">¿Que acción deseas hacer?</div>

                    <Link
                        class="mx-2 my-1 py-1 px-2 rounded-md bg-purple-400 text-white hover:bg-pink-900"
                        :href="route('users.index')"
                        >Ver usuarios</Link
                    >
                    <Link
                        class="mx-2 my-1 bg-gray-700 py-1 px-2 rounded-md text-white hover:bg-pink-900"
                        :href="route('roles.index')"
                        >Ver Roles</Link
                    >
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
