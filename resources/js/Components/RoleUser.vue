<template lang="">
    <div >
        <h4>Historial de usuario</h4>
        <ul>
        <li>
            usuario {{usuario[2].user.name}}
        </li>
        <li>
            cedula {{usuario[2].user.cedula}}
        </li>
        <li>
            Email: {{usuario[2].user.email}}
        </li>
        <li>
            Creado  {{usuario[2].user.created_at}}
        </li>
        <li>
            Ultima Actualizaci&oacute;n {{usuario[2].user.updated_at}}
        </li>
        <li>
            Tiene Rol asignado {{usuario[1].role != null ? 'Si' : 'No'}}
        </li>
        <li>
             Rol asignado {{usuario[1].role != null ? usuario[1].role : ''}}
        </li>
    </ul>
       
    </div>
</template>
<script>
export default {
    props:{
        usuario:Array
    },

    methods:{
       
    }
}
</script>
<style lang="">
    
</style>