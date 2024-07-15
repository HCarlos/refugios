<script setup>
import { useForm } from "@inertiajs/vue3";
import InputGroup from "@/Components/InputGroup.vue";
import SelectGroup from "@/Components/SelectGroup.vue";
import {ref} from "vue";
import AlertSuccess from "@/Components/AlertSuccess.vue";
import AceptarButton from "@/Components/AceptarButton.vue";

const props = defineProps({
    Refugio: {type: Object},
    Rutas: {type: Object},
    Ruta: {type: String},
    flash: {type: Object}
})

const form = useForm({
    id:0, numero:'',
    refugio:'', ubicacion:'', ubicacion_google:'',
    enlace:'', telefonos:'', observaciones:'',
    latitud:'', longitud:'', html:'', infraestructura:'',
    activado:0, poligono:'', categoria:'REFUGIO', capacidad:0,
    imagen:'', refugiorutaid:-1
});

const srcImg = ref('../storage/externo/1.gif');
const msj = ref('');
const classMsj = ref('hidden');
const cLatitud = ref('^(\\+|-)?(?:90(?:(?:\\.0{1,16})?)|(?:[0-9]|[1-8][0-9])(?:(?:\\.[0-9]{1,16})?))$');
const cLongitud = ref('^(\\-|-)?(?:180(?:(?:\\.0{1,16})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\\.[0-9]{1,16})?))$');

console.log(props.Refugio);

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
    form.activado = props.Refugio.activado ? 1 : 0;
    form.poligono = props.Refugio.poligono;
    form.categoria = props.Refugio.categoria;
    form.capacidad = props.Refugio.capacidad;
    form.refugiorutaid = props.Refugio.refugiorutaid;
    srcImg.value = '../storage/externo/' + props.Refugio.imagen;
    form.imagen = srcImg.value ;
    //form.imagen = new URL(srcImg.value).href
    //document.getElementById('srcImgID').value = srcImg.value;

}


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

const guardarRefugio = () =>{
    if (props.Refugio == null){
        form.post(route('refugio.save'), {
            onSuccess : () => {
                ok(props.flash.success);
            },
            onError: (response) => {
                console.log(response);
                form.errors = response;
            }
        });
    }else{
        form.post(route('refugio.update'), {
            onSuccess : () => {
                ok(props.flash.success);
            },
            onError: (response) => {
                form.errors = response;
            console.log(response);
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


console.log(props.Refugio);


const showImg = (e) => {
    form.imagen = e.target.files[0];
    srcImg.value = URL.createObjectURL(e.target.files[0]);
    console.log(srcImg.value);
}


</script>

<template>
            <AlertSuccess :class-msg="classMsj" :msg="msj">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5Zm6.61 10.936a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                </svg>
            </AlertSuccess>

        <div class="grid gap-6 bg-white mb-8 md:grid-cols-2 border rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <form class="form-horizontal" @submit.prevent="guardarRefugio" enctype="multipart/form-data">
                <InputGroup v-model.number="form.numero" :placeholder="'Número'" :errors="form.errors.numero" :classEspecial="'em9'" type="number" :class-especial="'em15 bg-yellow-50 border-gray-700'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.refugio" :errors="form.errors.refugio" :placeholder="'Refugio'" :type="'text'" :class-especial="'bg-yellow-50'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.ubicacion" :placeholder="'Ubicación'" :type="'text'" :errors="form.errors.ubicacion" :class-especial="'bg-yellow-50'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.ubicacion_google" :errors="form.errors.ubicacion_google" :placeholder="'Ubicación Google'"  :type="'text'" :disabledInput="'disabled'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                </InputGroup>
                <SelectGroup :opciones="opcionesRutas" v-model="form.refugiorutaid" :errors="form.errors.refugiorutaid" :class-especial="'em15 bg-yellow-50'" />
                <InputGroup v-model="form.capacidad" :errors="form.errors.capacidad" :placeholder="'Capacidad'"  :type="'text'" :class-especial="'em15 bg-yellow-50'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.infraestructura"  :errors="form.errors.infraestructura" :placeholder="'Infraestructura'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.enlace" :errors="form.errors.enlace" :placeholder="'Enlace'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.telefonos" :errors="form.errors.telefonos" :placeholder="'Teléfonos'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <SelectGroup :opciones="opcionesCategorias" v-model="form.categoria" :errors="form.errors.categoria" :class-especial="'em15 bg-yellow-50'" />
                <SelectGroup :opciones="opcionesActivado" v-model="form.activado" :errors="form.errors.activado" :class-especial="'em15 bg-yellow-50'" />
                <InputGroup v-model="form.latitud" :errors="form.errors.latitud" :placeholder="'Latitud'" :type="'text'" :class-especial="'em15 bg-yellow-50'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.longitud" :errors="form.errors.longitud" :placeholder="'Longitud'" :type="'text'" :class-especial="'em15 bg-yellow-50'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.poligono" :errors="form.errors.poligono" :placeholder="'Polígono'" :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.observaciones" :errors="form.errors.observaciones" :placeholder="'Observaciones'"  :type="'text'" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-if="props.Refugio == null" @change="showImg($event)" :errors="form.errors.imagen"  :type="'file'" :accept="'image/*'" required="'required'" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                    </svg>
                </InputGroup>
                <InputGroup v-else @change="showImg($event)" :errors="form.errors.imagen" :type="'file'" :accept="'image/*'" :placeholder="form.imagen" :mensajeMiniatura="form.imagen" :nameObject="'srcImgID'" :src="'srcImg'">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                    </svg>
                </InputGroup>
                <input type="hidden" v-model="form.id" value="{{form.id}}" >
<!--                <input type="hidden" v-model="form.imagen" value="{{form.imagen}}" >-->

<!--                <InputError class="mt-1" :message="form.errors.ubicacion" />-->
                <AceptarButton class="mt-4 float-right " >
                    Guardar
                </AceptarButton>
                </form>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <img :src="srcImg" width="500"  alt="" >
            </div>
        </div>

</template>
