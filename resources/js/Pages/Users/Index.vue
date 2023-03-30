<template lang="">
    <div class="container mx-auto">
        <div class="bg-gray-800">
            <h2 class="text-white">Usuarios registrados</h2>
        </div>
        <div class="md:grid md:grid-cols-8">
            <div class="md:col-span-6 bg-blue-200">
                <div class="mt-5 md:mt-0 shadow bg-white md:rounded-md p-4">
                    <!-- <pre> {{ users }} </pre> -->
                    <table
                        class="w-full px-4 text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Email</th>

                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, i) in users.data" :key="i">
                                <td class="border px-4 py-2">
                                    {{ user.name }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ user.cedula }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ user.email }}
                                </td>

                                <td class="border px-3 py-2">
                                    <a
                                        class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                                        @click="roleUser(user.id)"
                                    >
                                        Rol
                                    </a>
                                    <Link
                                        class="inline-block mx-1 px-2 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                        :href="route('users.edit', user.id)"
                                        >Editar</Link
                                    >
                                    <!-- <button>eliminar</button> -->
                                    <a
                                        class="inline-block mx-1 px-2 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:border-red-900 focus:ring-0 transition duration-150 ease-in-out"
                                        @click="destroyUser(user.id)"
                                        >Eliminar</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 text-center">
                    <Link
                        v-for="(link, i) in users.links"
                        :key="i"
                        :href="link.url"
                        v-html="link.label"
                        class="px-1"
                        :class="{
                            'text-gray-600': !link.url,
                            'font-bold': link.active,
                        }"
                    ></Link>
                </div>
            </div>
            <div class="md:col-span-2 bg-green-200">
                <div class="px-3">
                    <Link :href="route('roles.index')">Ver Roles</Link>

                    <RoleUser v-if="usuario.length > 0" :usuario="usuario" />
                </div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-8">
            <h4>Informes de usuarios</h4>
            <Link
                class="inline-block mx-1 px-2 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                :href="route('users.edit', user.id)"
                >Pdf</Link
            >
            <Link
                class="inline-block mx-1 px-2 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                :href="route('users.edit', user.id)"
                >Excel</Link
            >
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import RoleUser from "../../Components/RoleUser.vue";
export default {
    components: {
        Link,
        RoleUser,
    },
    created() {
        this.roleUser();
    },
    props: {
        users: Array,
    },
    data() {
        return {
            usuario: Array,
        };
    },
    methods: {
        destroyUser(data) {
            if (confirm("¿Eliminar usuario registrado?")) {
                let id_user = data;
                console.log("eliminando ..");
                this.$inertia.delete(this.route("users.destroy", id_user));
            }
        },

        async roleUser(id = 1) {
            const response = await fetch(`/api/roleUser/${id}`);

            const data = await response.json();
            console.log(data);
            this.usuario = data;
        },
    },
};
</script>
<style lang=""></style>
