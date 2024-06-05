<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import DarkButton from "@/Components/DarkButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputGroup from "@/Components/InputGroup.vue";
import SelectGroup from "@/Components/SelectGroup.vue";
import { ref } from "vue"

const props = defineProps({
    Refugio: {type: Object},
    Rutas: {type: Object},
    Ruta: {type: String}
})

const form = useForm({
    id:0, numero:1,
    refugio:'', ubicacion:'', ubicacion_google:'',
    enlace:'', telefonos:'', observaciones:'',
    latitud:'', longitud:'', html:'', infraestructura:'',
    activado:'0', poligono:'', categoria:'REFUGIO', capacidad:0,
    imagen:'', refugiorutaid:-1
});

const opcionesRutas = ref([]);
const opcionesCategorias = ref([]);
const opcionesActivado = ref([]);

props.Rutas.map( (row) => (
    opcionesRutas.value.push({'id':row.id, 'text':row.ruta})
));
opcionesCategorias.value.push({'id':'REFUGIO','text':'REFUGIO'});
opcionesCategorias.value.push({'id':'CENTRO DE ACOPIO','text':'CENTRO DE ACOPIO'});

opcionesActivado.value.push({'id':1,'text':'SI'});
opcionesActivado.value.push({'id':0,'text':'NO'});

const title_form = ref(
    (props.Refugio == null) ? 'Nuevo Refugio' : 'Editando el refugio',
);

// console.log(props.Refugio)

// const req = ref('required');
const srcImg = ref('../storage/externo/1.gif');
const msj = ref('');
const classMsj = ref('hidden');
const cLatitud = ref('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/');
const cLongitud = ref('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/');

const guardarRefugio = () =>{
    if (props.Refugio == null){
        form.post(route('refugio.save'), {
            onSuccess : () => {
                ok('Refugio creado con éxito');
            },
            onError: (response) => {
                console.log(response);
                form.errors = response;
            }
        });
    }else{
        form.put(route('refugio.update'), {
            onSuccess : () => {
                ok('Refugio actualizado con éxito');
            },
            onError: () => {
                console.log(data.toString);
            }
        });

    }
}

const ok = (m) =>{
    form.reset();
    msj.value=m;
    classMsj.value = 'block';
    setTimeout(()=>{
        classMsj.value = 'hidden'
        msj.value='';
    },800);
}


if (props.Refugio !== 'undefined' && props.Refugio != null){
    form.id = props.Refugio.id;
    form.numero = props.Refugio.numero;
    form.refugio = props.Refugio.refugio;
    form.ubicacion = props.Refugio.ubicacion;
    form.ubicacion_google = props.Refugio.ubicacion_google;
    form.enlace = props.Refugio.enlace;
    form.telefonos = props.Refugio.telefonos;
    form.observaciones = props.Refugio.observaciones;
    form.latitud = props.Refugio.latitud;
    form.longitud = props.Refugio.longitud;
    form.html = props.Refugio.html;
    form.infraestructura = props.Refugio.infraestructura;
    form.activado = props.Refugio.activado;
    form.poligono = props.Refugio.poligono;
    form.categoria = props.Refugio.categoria;
    form.capacidad = props.Refugio.capacidad;
    form.imagen = props.Refugio.imagen;
    form.refugiorutaid = props.Refugio.refugiorutaid;
    srcImg.value = '../storage/externo/' + props.Refugio.imagen;
}

</script>

<template>
    <Head title="Editar" />

    <AuthenticatedLayout>
        <template #header>
            <div class="inline-flex overflow-hidden mb-4 w-full">
                {{ title_form }}
                <NavLink :href="route('refugios.index')">
                    <DarkButton title="Listado de Refugios">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                        </svg>
                    </DarkButton>
                </NavLink>
            </div>
            <div class="alert alert-success " :class="classMsj"><p class="text-sm text-gray-600">... {{ msj }}</p></div>
        </template>

        <div class="grid gap-6 bg-white mb-8 md:grid-cols-2 border rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <form class="form-horizontal" @submit.prevent="guardarRefugio">
                <InputGroup v-model.number="form.numero" :placeholder="'Número'" :errors="form.errors.numero" class="em9 rounded-lg" type="number" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.numero" />-->
                <InputGroup v-model="form.refugio" :errors="form.errors.refugio" :placeholder="'Refugio'" :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.refugio" />-->
                <InputGroup v-model="form.ubicacion" :placeholder="'Ubicación'"  :type="'text'" :errors="form.errors.ubicacion">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.ubicacion_google" :errors="form.errors.ubicacion_google" :placeholder="'Ubicación Google'"  :type="'text'" :disabledInput="'disabled'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <SelectGroup :opciones="opcionesRutas" v-model="form.refugiorutaid" :errors="form.errors.refugiorutaid">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>
                </SelectGroup>
                <InputGroup v-model="form.infraestructura"  :errors="form.errors.infraestructura" :placeholder="'Infraestructura'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.capacidad" :errors="form.errors.capacidad" :placeholder="'Capacidad'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.enlace" :errors="form.errors.enlace" :placeholder="'Enlace'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.telefonos" :errors="form.errors.telefonos" :placeholder="'Teléfonos'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <SelectGroup :opciones="opcionesCategorias" v-model="form.categoria" :errors="form.errors.categoria">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>
                </SelectGroup>
                <SelectGroup :opciones="opcionesActivado" v-model="form.activado" :errors="form.errors.activado">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>
                </SelectGroup>
                <InputGroup v-model="form.observaciones" :errors="form.errors.observaciones" :placeholder="'Observaciones'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.latitud" :errors="form.errors.latitud" :placeholder="'Latitud'"  :type="'text'" :pattern="cLatitud" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.longitud" :errors="form.errors.longitud" :placeholder="'Longitud'"  :type="'text'" :pattern="cLongitud" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <InputGroup v-model="form.poligono" :errors="form.errors.poligono" :placeholder="'Polígono'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <input type="hidden" v-model="form.id" value="{{form.id}}" >

<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <PrimaryButton class="mt-4 float-right" >
                    Guardar
                </PrimaryButton>
                </form>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <img :src="srcImg" >
            </div>
        </div>

    </AuthenticatedLayout>
</template>
