<script setup>
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import Pagination from '@/Components/Pagination.vue';
// import {Head, useForm} from '@inertiajs/vue3';
// import NavLink from "@/Components/NavLink.vue";
import Form from "@/Pages/Refugios/Form.vue";
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ref} from "vue";

const props = defineProps({
    Rutas: {type: Object},
    Refugio: {type: Object},
    Ruta: {type: String}
})

const tituloUser = ref( (props.Refugio != null) ? 'Modificando el refugio: '+props.Refugio.id : 'Refugio Nuevo');


</script>

<template>
    <Head title="Refugios" />

    <AuthenticatedLayout>
        <template #header>
            {{ tituloUser }}
        </template>

        <Form :Rutas="Rutas" :Refugio="Refugio" :Ruta="Ruta"></Form>

    </AuthenticatedLayout>

</template>

