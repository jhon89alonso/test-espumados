<template lang="">
    <div>
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
    </div>
</template>
<script>
export default {
    props: { rol: Object },
    data() {
        return {
            form: {
                name: this.rol.name,
            },
        };
    },
    methods: {
        submit() {
            console.log(this.form);
            this.$inertia.put(this.route("roles.update",this.rol.id), this.form);
        },
    },
};
</script>
<style lang=""></style>
