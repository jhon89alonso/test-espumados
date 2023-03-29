<template lang="">
    <div>
        <div class="shadow bg-white md:rounded-md p-4">
            <form @submit.prevent="submit" class="w-full max-w-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label
                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="name"
                        >
                            nombre
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            v-model="form.name"
                            id="name"
                            type="text"
                            placeholder="Ingrese el nombre del rol desea asignar"
                            required
                        />
                    </div>
                   
                </div>

                <button
                    class="bg-blue-500 rounded-sm hover:bg-blue-900 text-white font-bold py-2 px-4"
                >
                    Guardar cambios
                </button>
            </form>
            <hr class="my-8" />
            <Link
                class="btn bg-yellow-300 hover:bg-green-800 text-black font-bold py-2 px-5"
                :href="route('roles.index')"
                >Volver</Link
            >
        </div>
    </div>
</template>
<script>
import { defineComponent } from "vue";

import Welcome from "@/Jetstream/Welcome.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Welcome,
        Link,
    },
    // props: { permisos: Array, roles: Array },
    data() {
        return {
            form: {
                name: "",
                // permissions: [],
            },
        };
    },

    methods: {
        submit() {
            console.log(this.form);
            this.$inertia.post(this.route("roles.store"), this.form);
        },
    },
});
</script>
<style lang=""></style>
