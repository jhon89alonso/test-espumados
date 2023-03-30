<template lang="">
    <div>
        crear usuario

        <div class="bg-gray-100 my-2">
            <form @submit.prevent="submit" class="w-full text-gray-900">
                <div class="">
                    <div class="my-2 mx-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Nombre</label
                        >
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                            type="text"
                            v-model="form.name"
                        />
                    </div>

                    <div class="my-2 mx-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Cedula</label
                        >
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                            type="number"
                            v-model="form.cedula"
                        />
                    </div>
                    <div class="my-2 mx-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Email</label
                        >
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                            type="email"
                            v-model="form.email"
                        />
                    </div>
                    <div class="my-2 mx-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Password</label
                        >
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                            type="text"
                            v-model="form.password"
                        />
                    </div>

                    <div class="my-1 text-center py-2">
                        <button class="px-6 py-3 bg-purple-400 text-gray-900">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <Link
            class="inline-block mx-1 px-2 py-2 border-2 border-yellow-600 text-yellow-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            :href="route('users.index')"
            >Cancelar</Link
        >
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import { defineComponent } from "vue";
export default defineComponent( {
    components: {
        Link,
    },

    data() {
        return {
            form: {
                name: "",
                cedula: "",
                email: "",
                password: "",
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.post(this.route("users.store"), this.form);
        },
    },
});
</script>
<style lang=""></style>
