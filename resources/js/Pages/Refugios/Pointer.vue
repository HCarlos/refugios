<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from "@inertiajs/vue3";
import MapPointer from "@/Pages/Refugios/MapPointer.vue";

const props = defineProps({
    Rutas: {type: Object},
    Refugio: {type: Object},
    Ruta: {type: String}
})

const tituloUser = 'Modificando el refugio'+props.Refugio.id;

</script>

<template>
    <Head title="Punto" />

    <AuthenticatedLayout>
        <template #header>
            "{{ tituloUser }}"
        </template>

        <MapPointer :Rutas="Rutas" :Refugio="Refugio" :Ruta="Ruta"></MapPointer>

    </AuthenticatedLayout>
</template>

