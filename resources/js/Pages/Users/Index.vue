<template lang="">
    <div class="container mx-auto">
        <div class="bg-gray-800">
            <h2 class="text-white">Usuarios registrados</h2>
        </div>
        <div class="md:grid md:grid-cols-8">
            <div class="md:col-span-6 bg-blue-200">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                tempore id sint enim sapiente possimus unde neque consequuntur
                dolorem? Sequi dolores beatae repellat saepe cupiditate totam
                quibusdam, doloribus tempora ea!

                <div
                    class="md:col-span-5 mt-5 md:mt-0 shadow bg-white md:rounded-md p-4"
                >
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

                                <td class=" border px-3 py-2">
                                    <Link
                                        class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                                        :href="route('users.show', user.id)"
                                    >
                                        Ver
                                    </Link>
                                    <Link
                                        class="inline-block mx-1 px-2 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                        :href="route('users.edit', user.id)"
                                        >Editar</Link
                                    >
                                    <!-- <button>eliminar</button> -->
                                </td>
                                <td class="px-4 py-2">
                                    <!-- <Link
                                        class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                                        :href="
                                            route(
                                                'centroCosto.edit',
                                                centroCosto.id
                                            )
                                        "
                                        >Editar</Link
                                    > -->
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
            <div class="md:col-span-2 bg-green-200"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis odio quam eius alias rerum? Pariatur officiis, nihil alias reprehenderit ipsum necessitatibus sit itaque eligendi inventore deleniti magni accusamus earum eos.</p></div>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    props: {
        users: Array,
    },
};
</script>
<style lang=""></style>
