<template>
    <Head title="clientes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clientes registrados
            </h2>
        </template>
        <div class="container mx-auto">
            <div class="relative overflow-x-auto bg-white w-full text-gray-500">
                <table class="border-collapse table-auto text-sm text-gray-500">
                    <caption>
                        clientes
                    </caption>
                    <thead class="text-gray-800 border-gray-500 uppercase">
                        <tr>
                            <th class="px-3 py-2 w-52 bg-gray-400">Nombre</th>
                            <th class="px-3 py-2 w-40">Nit</th>
                            <th class="px-3 py-2 w-40 bg-gray-400">Contacto</th>
                            <th class="px-3 py-2 w-40">Acci&oacute;n</th>
                        </tr>
                    </thead>
                </table>
                <tbody>
                    <tr
                        class="border border-gray-900"
                        v-for="(cliente, index) in clientes"
                        :key="index"
                    >
                        <th
                            class="px-1 py-4 text-sm w-52 text-gray-900 bg-gray-300"
                        >
                            {{ cliente.nombre }}ss
                        </th>
                        <th
                            class="px-1 py-4 text-sm w-40 text-gray-900 bg-gray-50"
                        >
                            {{ cliente.nit }}
                        </th>
                        <th
                            class="px-1 py-4 text-sm w-40 text-gray-900 bg-gray-300"
                        >
                            {{ cliente.contacto }}
                        </th>
                        <th
                        v-if="$page.props.auth.user.id == cliente.register_user"
                            class="px-1 py-4 text-sm w-40 text-gray-900 bg-gray-50"
                        >
                            <Link :href="route('clientes.edit', cliente.id)"
                                >Editar</Link
                            >
                            <!-- {{$page.props.auth.user.id}}
                            {{ cliente.register_user }} -->
                            <a
                            
                                class="inline-block mx-1 px-2 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:border-red-900 focus:ring-0 transition duration-150 ease-in-out cursor-pointer"
                                @click="eliminar(cliente.id)"
                                >Eliminar</a
                            >
                            <!-- {{ cliente.id }} -->
                        </th>
                    </tr>
                </tbody>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    clientes: Array,
});

const eliminar = (id) => {
    console.log("eliminando ..." + id);
};
</script>
<style lang=""></style>
