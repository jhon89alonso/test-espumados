<script >
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
}
</script>

<template>
    <h2 class="my-8">Dashboard</h2>

    <Link class="mx-2 my-1 bg-purple-400 text-white hover:bg-pink-900" :href="route('users.index')">Ver usuarios</Link>
    <Link class="mx-2 my-1 bg-purple-400 text-white hover:bg-pink-900" :href="route('roles.index')">Ver Roles</Link>

</template>
