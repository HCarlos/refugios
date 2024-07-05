<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SelectGroup from "@/Components/SelectGroup.vue";
import Multiselect from "@/Components/Multiselect.vue";
import {ref} from "vue";
import axios from "axios";

const opcionesColonias = ref([]);
const opcionesRefugios = ref([]);
const opcionesRefugioColonias = ref([]);
const selected1 = ref([]);
const selected2 = ref([]);
const select1lleno = ref(false);
const select2lleno = ref(false);
const select3lleno = ref(false);

const props = defineProps({
    Colonias: {type: Object},
    Refugios: {type: Object},
    flash: {type: Object}
})

const frmColoniaRefugio = useForm({
    id:0, refugio_id:0, colonia_id:0, selected1:[], selected2:[],
});

props.Colonias.map( (row) => (
    opcionesColonias.value.push({'id':row.id, 'text':row.colonia+' '+row.comunidad+' '+row.id})
));

props.Refugios.map( (row) => (
    opcionesRefugios.value.push({'id':row.id, 'text':row.refugio+' ('+row.numero+')'})
));

const getColonias = (e) => {
    select1lleno.value = false;
    select2lleno.value = false;
    select3lleno.value = false;
    if (parseInt(e.target.value) > 0){
        select3lleno.value = true;
        frmColoniaRefugio.refugio_id = e.target.value;
        getRefugiosFromDB();
    }
};

// Con AXIOS
function getRefugiosFromDB(){
    console.log(frmColoniaRefugio.refugio_id);
    select1lleno.value = false;
    select2lleno.value = false;
    llenarOpcionesRefugioColonias("getColoniasFromRefugiosAuth");
};

function addColoniaFromRefugio(){
    select1lleno.value = false;
    console.log(frmColoniaRefugio.refugio_id);
    frmColoniaRefugio.selected1 = selected1;
    console.log(frmColoniaRefugio.selected1);
    llenarOpcionesRefugioColonias("addColoniaFromRefugio");

};

function removeColoniaFromRefugio(){
    select2lleno.value = false;
    console.log(frmColoniaRefugio.refugio_id);
    frmColoniaRefugio.selected2 = selected2;
    console.log(frmColoniaRefugio.selected2);
    llenarOpcionesRefugioColonias("removeColoniaFromRefugio");
};

const llenarOpcionesRefugioColonias = async (Url) => {
    try {
        const response = await axios.post(Url, frmColoniaRefugio)
            .then(response => {
                console.log("Datos recibidos:", response);
                if (response.data.mensaje === 'OK') {
                    opcionesRefugioColonias.value = [];
                    response.data.refugio_colonias.map( (row) => (
                        opcionesRefugioColonias.value.push({'id':row.id, 'text':row.colonia})
                    ));
                    eveluaLosSelect();
                }else {
                    // classMsjNoHayDatos.value = 'block';
                }
            })
            .catch(response => {
                console.log("Error:", response.message);
            })
    } catch (error) {
        console.error("Error al obtener los datos: ", error.message);
    }

}

function eveluaLosSelect(){
    if (select3lleno.value){
        select1lleno.value = selected1.value.length > 0;
        select2lleno.value = selected2.value.length > 0;
    }
}



</script>

<template>

    <Head title="Colonias" />

    <AuthenticatedLayout>
        <template #header>
            Asignar colonias a refugios
        </template>

        <!-- Cards with title -->
        <div class="grid gap-6 mb-8 md:grid-cols-3">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Colonias
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <select class="block w-full mt-1 h-96 text-sm dark:text-white-300 dark:border-white-600 dark:bg-white-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-white"
                            multiple
                            @click="eveluaLosSelect"
                            v-model="selected1">
                        <option v-for="(item, index) in opcionesColonias" :key="index" :value="item.id" >
                            {{ item.text }}
                        </option>
                    </select>
                    <span>Selected: {{ selected1 }}</span>

                </p>
            </div>
            <div class="min-w-0 p-4 text-white text-center bg-white-600 rounded-lg shadow-xs w-full justify-center">
                <h4 class="mb-4 font-semibold text-white ">
                    Opciones<br /><br /><br />
                    <PrimaryButton :show="select1lleno" @click="addColoniaFromRefugio" :type="'default'" title="Asigar al refugio seleccionado"
                                   :class-btn="'flex-auto text-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                    </PrimaryButton><br /><br />
                    <PrimaryButton :show="select2lleno" @click="removeColoniaFromRefugio" :type="'default'" title="Quitar colonia del refugio seleccionado"
                                   :class-btn="'flex-auto text-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>

                    </PrimaryButton>
                    </h4>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-70">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Refugios
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <SelectGroup :opciones="opcionesRefugios"  @change="getColonias($event)"  :class-especial="'bg-yellow-50'" />
                </p><br />
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Colonias asignadas a este refugio
                </h4>
                <p class="text-gray-600 dark:text-gray-400 h-72">
                    <select class="block w-full mt-1 h-72 text-sm dark:text-white-300 dark:border-white-600 dark:bg-white-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-white"
                        multiple
                        @click="eveluaLosSelect"
                        v-model="selected2">
                        <option v-for="(item, index) in opcionesRefugioColonias" :key="index" :value="item.id" >
                            {{ item.text }}
                        </option>
                    </select>
                    <span>Selected: {{ selected2 }}</span>
                </p>
            </div>
        </div>

    </AuthenticatedLayout>

</template>

<style scoped>

</style>
