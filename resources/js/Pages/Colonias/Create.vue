<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Form from "@/Pages/Colonias/Form.vue";
import {ref} from "vue";

const props = defineProps({
    Comunidades: {type: Object},
    Colonia: {type: Object},
})
const opcionesComunidades = ref([]);
props.Comunidades.map( (row) => (
    opcionesComunidades.value.push({'id':row.comunidad_id, 'text':row.comunidad})
));

const tituloUser = ref( (props.Colonia != null) ? 'Modificando la colonia: '+props.Colonia.id : 'Colonia Nueva');


</script>

<template>
    <Head title="Colonias" />

    <AuthenticatedLayout>
        <template #header>
            {{ tituloUser }}
        </template>

        <Form :Comunidades="opcionesComunidades" :Colonia="Colonia" ></Form>

    </AuthenticatedLayout>

</template>

