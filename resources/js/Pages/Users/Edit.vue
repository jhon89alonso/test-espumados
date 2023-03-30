<template lang="">
    <div class="m-2">
        <h2>Editar Usuario:{{ user.name }}</h2>
    </div>

    <div class="bg-gray-100">
        <form @submit.prevent="submit" class="w-full text-gray-900">
            <div class="">
                <div class="my-2 mx-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900"
                        >Nombre</label
                    >
                    <input
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                        type="text"
                        v-model="form.name"
                    />
                </div>

                <div class="my-2 mx-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900"
                        >Cedula</label
                    >
                    <input
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                        type="number"
                        v-model="form.cedula"
                    />
                </div>
                <div class="my-2 mx-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900"
                        >Email</label
                    >
                    <input
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                        type="email"
                        v-model="form.email"
                    />
                </div>
                <div class="my-2 mx-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900"
                        >Password</label
                    >
                    <input
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5"
                        type="text"
                        v-model="form.password"
                    />
                </div>

                <div class="my-3 text-center py-7">
                    <select
                        name="rol"
                        id="rol"
                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        v-model="form.rol"
                    >
                        <option value=""></option>
                        <option
                            v-for="(rol, i) in roles"
                            :key="i"
                            :value="rol.id"
                        >
                            {{ rol.name }}
                        </option>
                    </select>
                </div>

                <div class="my-3 text-center py-7">
                    <button class="px-6 py-5 bg-green-400 text-gray-900">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    props: {
        user: Object,
        roles: Array,
    },
    data() {
        return {
            form: {
                name: this.user.name,
                cedula: this.user.cedula,
                email: this.user.email,
                password: this.user.password,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.put(
                this.route("users.update", this.user.id),
                this.form
            );
        },
    },
};
</script>
<style lang=""></style>
