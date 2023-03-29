<template lang="">
    <div class="md:grid md:grid-cols-6 gap-2">
        <div class="md:col-span-1 bg-green-200">
            <h3>Roles del sistema</h3>
            <Link :href="route('roles.create')">Crear Rol</Link>
        </div>

        <div class="md:col-span-5 bg-red-50">
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th>Nombre de rol</th>
                        <th>Creado</th>

                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(rol, i) in roles" :key="i">
                        <td class="border px-4 py-2">
                            {{ rol.name }}
                        </td>

                        <td class="border px-4 py-2">{{ rol.created_at }}</td>

                        <td class="border px-3 py-2">
                            <Link
                                class="text-gray-700 mx-2 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                                :href="route('roles.show', rol.id)"
                            >
                                Ver
                            </Link>
                            <Link
                                class="inline-block mx-2 px-3 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                :href="route('roles.edit', rol.id)"
                                >Editar</Link
                            >
                            <!-- <button>eliminar</button> -->
                            <a
                                class="inline-block mx-1 px-2 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:border-red-900 focus:ring-0 transition duration-150 ease-in-out"
                                @click="destroyRol(rol.id)"
                                >Eliminar</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import Edit from "./Edit.vue";
export default {
    components: {
        Link,
        Edit,
    },
    props: {
        roles: Array,
    },
    data() {
        return {
            id_edit: "",
            rol_edit: "",
        };
    },
    methods: {
        editar(id, value) {
            this.id_edit = id;
            this.rol_edit = value;
            console.log(this.id_edit + " " + this.rol_edit);
        },

        destroyRol(data) {
            if (confirm("¿Eliminar usuario Rol?")) {
                let id = data;
                console.log("eliminando ..");
                this.$inertia.delete(this.route("roles.destroy", id));
            }
        },
    },
};
</script>
<style lang=""></style>
