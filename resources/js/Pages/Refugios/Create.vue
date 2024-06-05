<script setup>
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import Pagination from '@/Components/Pagination.vue';
// import {Head, useForm} from '@inertiajs/vue3';
// import NavLink from "@/Components/NavLink.vue";
import Form from "@/Pages/Refugios/Form.vue";

const props = defineProps({
    Rutas: {type: Object},
    Refugio: {type: Object},
    Ruta: {type: String}
})

</script>

<template>
    <Form :Rutas="Rutas" :Refugio="Refugio" :Ruta="Ruta"></Form>
</template>

