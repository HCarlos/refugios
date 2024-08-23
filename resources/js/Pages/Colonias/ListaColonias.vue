<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import AlertSuccess from "@/Components/AlertSuccess.vue";
import {ref} from "vue"
import DarkButton from "@/Components/DarkButton.vue";
import SelectGroup from "@/Components/SelectGroup.vue";
import axios from 'axios'
import AlertWarning from "@/Components/AlertWarning.vue";

const opcionesColonias = ref([]);
const opcionesRefugios = ref([]);
const opcionesCategorias = ref([]);
const opcionesActivado = ref([]);
let Refugios = ref([]);
let ColoniaRefugio = ref([]);
// let NuevoRefugio = ref([])

const props = defineProps({
    Colonias: {type: Object},
    Refugios: {type: Object},
    flash: {type: Object}
})

const frmColoniaRefugio = useForm({
    id:0, refugio_id:0, numero:0, latitud:0.00, longitud:0.00,
    activado:0, refugiocolonia_id:0, zona:'',
    refugioruta_id:0, ruta:'', colonia1_id:0, colonia1:'',
    colonia_id:0, colonia:'', comunidad_id:0, comunidad:'',
    tipocomunidad_id:0, tipocomunidad:0, nuevo_refugio_id:0,
    nuevo_refugio:''
});

props.Colonias.map( (row) => (
    opcionesColonias.value.push({'id':row.id, 'text':row.colonia+' '+row.comunidad+' '+row.id})
));

props.Refugios.map( (row) => (
    opcionesRefugios.value.push({'id':row.id, 'text':row.refugio+' ('+row.numero+')'})
));

const showModalEliminar = ref(false);
const showModalAgregarRefugio = ref(false);
const classAlertMsg = ref( (props.flash.success != null) ? '' : 'hidden');
const classMsjNoHayDatos = ref(  'hidden');
const msg = ref( (props.flash.success != null) ? props.flash.success : '');


// Con AXIOS

const getRefugios = (e) => {
    classMsjNoHayDatos.value = 'hidden';
    Refugios.value = [];
    frmColoniaRefugio.id = e.target.value;
    console.log(frmColoniaRefugio.id);
    getRefugiosFromDB();
};

const getRefugiosFromDB = async () => {
    console.log(frmColoniaRefugio.id);
    try {
        const response = await axios.post("getRefugiosFromColoniasAuth", frmColoniaRefugio)
            .then(response => {
                console.log("Datos recibidos:", response.data.refugios.original.mensaje);
                if (response.data.refugios.original.mensaje === 'OK') {
                    Refugios.value = response.data.refugios.original;
                    console.log("Colonia recibida:", response.data.colonia.colonia);
                    ColoniaRefugio.value = response.data.colonia;
                    llenarColoniaRefugio(ColoniaRefugio.value);
                }else {
                    classMsjNoHayDatos.value = 'block';
                }
            })
            .catch(response => {
                console.log("Error:", response.message);
            })
    } catch (error) {
        console.error("Error al obtener los datos: ", error.message);
    }
};




const llenarColoniaRefugio = (cr) => {
    frmColoniaRefugio.id = cr.id;
    frmColoniaRefugio.numero = cr.numero;
    frmColoniaRefugio.colonia1 = cr.colonia1;
    frmColoniaRefugio.colonia1_id = cr.colonia1_id;
    frmColoniaRefugio.colonia = cr.colonia;
    frmColoniaRefugio.colonia_id = cr.colonia_id;
    frmColoniaRefugio.activado = cr.activado;
    frmColoniaRefugio.comunidad = cr.comunidad;
    frmColoniaRefugio.comunidad_id = cr.comunidad_id;
    frmColoniaRefugio.tipocomunidad = cr.tipocomunidad;
    frmColoniaRefugio.tipocomunidad_id = cr.tipocomunidad_id;
    frmColoniaRefugio.refugio_id = cr.refugio_id;
    frmColoniaRefugio.refugiocolonia_id = cr.refugiocolonia_id;
    frmColoniaRefugio.refugioruta_id = cr.refugioruta_id;
    frmColoniaRefugio.ruta  = cr.ruta;
    frmColoniaRefugio.zona = cr.zona;
    frmColoniaRefugio.latitud = cr.latitud;
    frmColoniaRefugio.longitud = cr.longitud;
};

const comboRefugios = async (e) => {
    classMsjNoHayDatos.value = 'hidden';
    // NuevoRefugio.nuevo_refugio_id = e.target.value;
    // NuevoRefugio.nuevo_refugio = e.target.text;
    frmColoniaRefugio.nuevo_refugio_id = e.target.value;
    // frmColoniaRefugio.nuevo_refugio = NuevoRefugio.nuevo_refugio;
    frmColoniaRefugio.nuevo_refugio = e.target.text;
    console.log(frmColoniaRefugio.nuevo_refugio_id+'_'+frmColoniaRefugio.colonia_id);
};

const openModalEliminar = (b) => {
    frmColoniaRefugio.refugio_id = b.id;
    // frmColoniaRefugio.numero = b.numero;
    // frmColoniaRefugio.refugio = b.refugio;
    showModalEliminar.value = true;
};

const openModalAgregarRefugio = (b) => {
    showModalAgregarRefugio.value = true;
};

const closeModalEliminar = () => {
    showModalEliminar.value = false;
};

const closeModalAgregarRefugio = () => {
    showModalAgregarRefugio.value = false;
};


const eliminarRefugio = () => {
    console.log(frmColoniaRefugio.refugio_id+' '+frmColoniaRefugio.id);
    frmColoniaRefugio.post(route('coloniarefugio.destroy',frmColoniaRefugio),{
        onSuccess: () => {
            if ( props.flash.mensaje === 'OK' ){
                ok(props.flash.success);
            }else{
                ok(props.flash.error);
            }
        },
        onError: () => {
            ok(props.flash.error);
        }
    });
};

const agregarRefugio = () => {
    console.log(frmColoniaRefugio.nuevo_refugio_id+' '+frmColoniaRefugio.id);
    frmColoniaRefugio.post(route('coloniarefugio.add',frmColoniaRefugio),{
        onSuccess: () => {
            if ( props.flash.mensaje === 'OK' ){
                ok(props.flash.success);
            }else{
                ok(props.flash.error);
            }
        },
        onError: () => {
            ok(props.flash.error);
        }
    });
};




const ok = (m) =>{
    closeModalEliminar();
    closeModalAgregarRefugio();
    msg.value = m;
    console.log(msg.value);
    classAlertMsg.value = 'block bg-warning-800';
    setTimeout(()=>{
        classAlertMsg.value = 'hidden'
        msg.value='';
        getRefugiosFromDB();
    },3000);
}

const editMapPointRefugio = (r) => {
    window.open("/refugios-getPosition.php?id=" + r.id);
};


var tituloUser = "Colonias";

</script>

<template>
    <Head title="Colonias" />

    <AuthenticatedLayout>
        <template #header>
            {{ tituloUser }}
        </template>
        <div class="p-4 bg-white rounded-lg shadow-xs">
            <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <SelectGroup :opciones="opcionesColonias"  @change="getRefugios($event)" :errors="frmColoniaRefugio.errors.colonia_id" :class-especial="'em25 bg-yellow-50'" />
                    </div>
                </div>
                <PrimaryButton  @click="openModalAgregarRefugio(frmColoniaRefugio)" title="Agregar refugio" :type="'default'" :classBtn="'px-3 py-2 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 rojo-morena border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald'">
                    <slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                        </svg>
                    </slot>
                </PrimaryButton>
            </div>
            <AlertSuccess :classMsg="classAlertMsg" :Msg="msg" classIcon="text-green-800">
                <slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                    </svg>
                </slot>
            </AlertSuccess>



            <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
                <div class="overflow-x-auto w-full">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-xs font-bold tracking-wide text-left text-blue-500 uppercase bg-gray-300 border-b">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Número</th>
                            <th class="px-4 py-3">Refugio</th>
                            <th class="px-4 py-3">Ubicación</th>
                            <th class="px-4 py-3">Infraestructra</th>
                            <th class="px-4 py-3">Capacidad</th>
                            <th class="px-4 py-3">Enlace</th>
                            <th class="px-4 py-3">Teléfonos</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                        <tr v-for="Refugio in Refugios.data" :key="Refugio.id" class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ Refugio.id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <NavLink :href="route('refugio.edit',Refugio.id)" >
                                    <SecondaryButton title="Editar refugio">
                                        {{ Refugio.numero }}
                                    </SecondaryButton>
                                </NavLink>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <DarkButton @click="editMapPointRefugio(Refugio)" title="Cambiar la geolocalización">
                                    {{ Refugio.refugio }}
                                </DarkButton>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ Refugio.ubicacion }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ Refugio.infraestructura }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ Refugio.capacidad }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ Refugio.enlace }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ Refugio.telefonos }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <DangerButton @click="openModalEliminar(Refugio)" title="Eliminar refugio">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </DangerButton>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <AlertWarning :classMsg="classMsjNoHayDatos" :Msg="'No se encontraron Refugios'" classIcon="text-orange-800">
                        <slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                        </slot>
                    </AlertWarning>
                </div>
            </div>




        </div>
        <Modal :show="showModalEliminar" @close="closeModalEliminar">
            <div class="p-6">
                <p>
                    ¿Quiéres quitar
                    <span class="text-2x1 font-medium text-orange-700">{{ColoniaRefugio.colonia}} </span>
                    del refugio
                    <span class="text-2x1 font-medium text-purple-800">{{frmColoniaRefugio.refugio}} </span> ?
                </p>

            </div>
            <div class="m-6 flex justify-end">
                <PrimaryButton @click="eliminarRefugio" class="mr-4" :class-btn="'rojo-morena'">Si, elimínalo</PrimaryButton>
                <SecondaryButton @click="closeModalEliminar">Cancelar</SecondaryButton>
            </div>
        </Modal>

        <Modal :show="showModalAgregarRefugio" @close="closeModalAgregarRefugio">
            <div class="p-6">
                <SelectGroup
                    :opciones="opcionesRefugios"
                    @change="comboRefugios($event)"
                    :errors="frmColoniaRefugio.errors.refugio"
                    :class-especial="'em25 bg-yellow-50'" />
                <br/>
                <br/>
                <p>
                    ¿Quiéres agregar el refugio
                    <span class="text-2x1 font-medium text-orange-700">{{frmColoniaRefugio.nuevo_refugio}} </span>
                    a la colonia
                    <span class="text-2x1 font-medium text-purple-800">{{frmColoniaRefugio.colonia}} </span> ?
                </p>

            </div>
            <div class="m-6 flex justify-end">
                <PrimaryButton @click="agregarRefugio" class="mr-4" :class-btn="'rojo-morena'">Agregar</PrimaryButton>
                <SecondaryButton @click="closeModalAgregarRefugio">Cancelar</SecondaryButton>
            </div>
        </Modal>

    </AuthenticatedLayout>
</template>
<!--<style>-->
<!--@import 'datatables.net-bs5';-->
<!--@import 'datatables.net-dt';-->
<!--</style>-->
