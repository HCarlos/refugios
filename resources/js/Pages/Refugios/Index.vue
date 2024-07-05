<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import AlertSuccess from "@/Components/AlertSuccess.vue";
import AceptarButton from "@/Components/AceptarButton.vue";
import {onMounted, ref} from "vue"
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import Buttons from 'datatables.net-buttons';

// import DataTablesLib from 'datatables.net';

import 'datatables.net-select';
import 'datatables.net-responsive';
import 'datatables.net-buttons';
import 'datatables.net-buttons/js/buttons.html5';

// import jszip from 'jszip';

// import * as XLSX from 'xlsx';
// import * as fs from 'fs';
// XLSX.set_fs(fs);

DataTable.use(DataTablesCore);
DataTable.use(Buttons);

// DataTable.use(jszip);

const props = defineProps({
	Refugios: {type: Object},
    flash: {type: Object}
})

const columns = [
    {data: 'id', title: 'ID'},
    {data: 'numero', title: '#'},
    {data: 'refugio', title: 'REFUGIO'},
    {data: 'ubicacion', title: 'UBICACION'},
    {data: 'infraestructura', title: 'INFRAESTRUCTURA'},
    {data: 'capacidad', title: 'CAPACIDAD'},
    {data: 'enlace', title: 'ENLACE'},
    {data: 'telefonos', title: 'TELEFONOS'}
];


let options = {
    dom: 'Bftip',
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json'
    },
    buttons: ['csv', 'excel', 'pdf', 'print'],
    responsive: true,
    select: true,
    processing: true,
    paging: true,
    lengthMenu: [
        [10, 25, 50, 75, 100, -1],
        ['10', '25', '50', '75', '100', 'Todos']
    ],
    displayLength: 10
};


const form = useForm({
    id:'',
    refugio:'',ubicacion:'',ubicacion_google:'',
    enlace:'',telefonos:'',observaciones:'',
    latitud:'',longitud:'',html:'',infraestructura:'',
    activado:'',poligono:'',categoria:'',capacidad:'',
    imagen:'',refugiorutaid:'',
});

const showModalEliminar = ref(false);
const showButtonPoint = ref(false);
const showButtonXLSX = ref(props.Refugios.length > 0);
const msg = ref( (props.flash.success != null) ? props.flash.success : '');
const classMsj = ref( (props.flash.success != null) ? '' : 'hidden');
const data = ref([]);
const table = ref();
let dt;
const select_refugio_id = ref(0);

props.Refugios.map(function(value, key) {
    data.value.push(value);
});


onMounted(function () {
    dt = table.value.dt;
});


const openModalEliminar = (b) => {
    form.id = b.id;
    form.numero = b.numero;
    form.refugio = b.refugio;
    showModalEliminar.value = true;
};

const closeModalEliminar = () => {
    showModalEliminar.value = false;
};

const eliminarRefugio = () => {
    form.post(route('refugio.destroy',form.id),{
        onSuccess: () => {
            ok(props.flash.success);
        }
    });
};

const editRefugio = (r) => {
    window.open("/refugio.edit/" + r);
};

const editMapPointRefugio = (r) => {
    window.open("/refugios-getPosition.php?id=" + r);
};


function itemSeleccionado() {
    showButtonPoint.value = false;
    select_refugio_id.value = 0;
    dt.rows({ selected: true }).every(function () {
        let idx = data.value.indexOf(this.data());
        if (idx >= 0) {
            select_refugio_id.value = data.value[idx].id;
            showButtonPoint.value = true;
            console.log(select_refugio_id.value + ' ' + data.value[idx].id,' => ',data.value[idx].refugio);
        }
    });
}

const ok = (m) =>{
    closeModalEliminar();
    msg.value = m;
    console.log(msg.value);
    classMsj.value = 'block';
    setTimeout(()=>{
       classMsj.value = 'hidden'
        msg.value='';
    },4200);
}

const exportXSLX = (e) => {
    // const XLSX = require('xlsx');

/*
    let public_path = process.env.NODE_ENV  ===  'production'  ?  './'  :  '/'

    const workbook = XLSX.readFile("refugios.xlsx");
    let first_sheet_name = workbook.SheetNames[0];
    let worksheet = workbook.Sheets[first_sheet_name];
    let cell = worksheet['D4'].v;
    console.log(cell)
    worksheet['D4'].v = 'NEW VALUE from NODE';
    XLSX.utils.sheet_add_aoa(worksheet, [['NEW VALUE from NODE']], {origin: 'D4'});
    XLSX.writeFile(workbook, 'test2.xlsx');
*/


    // let workbook = XLSX.readFile("refugios.xlsx");
/*

    var table_elt = document.getElementById("my-table-id");
    var workbook = XLSX.utils.table_to_book(table_elt);
    var ws = workbook.Sheets["Sheet1"];
    XLSX.utils.sheet_add_aoa(ws, [["Created "+new Date().toISOString()]], {origin:-5});
    XLSX.writeFile(workbook, "Report.xlsx");

*/

    window.open("/ListaRefugios");

}





var tituloUser = "Refugios";

</script>

<template>
	<Head title="Refugios" />

	<AuthenticatedLayout>
		<template #header>
            {{ tituloUser }}


		</template>
<!--        <div>-->
<!--        <DataTable-->
<!--            class="display"-->
<!--            :columns="columns"-->
<!--            :data="data"-->
<!--            :options="{ select: true }"-->
<!--            ref="table"-->
<!--        />-->
<!--        </div>-->




		<div class="p-4 bg-white rounded-lg shadow-xs">
			<div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <NavLink :href="route('refugio.create')" :titulo="'Nuevo refugio'">
                    <PrimaryButton :show="true" class="mb-2" :type="'default'" :classBtn="'px-3 py-2 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 rojo-morena border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald'">
                        <slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                            </svg>
                        </slot>
                    </PrimaryButton>
                </NavLink>

                <PrimaryButton :show="showButtonXLSX" @click="exportXSLX($event)" title="Editar refugio" class="ml-1 mt-1" :type="'default'" :classBtn="'px-3 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-emerald-600 border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald'">
                    <slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 18.375V5.625ZM21 9.375A.375.375 0 0 0 20.625 9h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5ZM10.875 18.75a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5ZM3.375 15h7.5a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375Zm0-3.75h7.5a.375.375 0 0 0 .375-.375v-1.5A.375.375 0 0 0 10.875 9h-7.5A.375.375 0 0 0 3 9.375v1.5c0 .207.168.375.375.375Z" clip-rule="evenodd" />
                        </svg>
                    </slot>
                </PrimaryButton>



                <PrimaryButton :show="showButtonPoint" @click="editRefugio(select_refugio_id)" title="Editar refugio" class="ml-2 mt-1" :type="'default'" :classBtn="'px-3 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'">
                    <slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>
                    </slot>
                </PrimaryButton>
                <PrimaryButton :show="showButtonPoint" @click="editMapPointRefugio(select_refugio_id)" class="mb-2" title="Editar ubicación" :type="'default'" :classBtn="'px-3 py-2 ml-2 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-600 border border-transparent rounded-lg active:bg-orange-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-orange'">
                    <slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM6.262 6.072a8.25 8.25 0 1 0 10.562-.766 4.5 4.5 0 0 1-1.318 1.357L14.25 7.5l.165.33a.809.809 0 0 1-1.086 1.085l-.604-.302a1.125 1.125 0 0 0-1.298.21l-.132.131c-.439.44-.439 1.152 0 1.591l.296.296c.256.257.622.374.98.314l1.17-.195c.323-.054.654.036.905.245l1.33 1.108c.32.267.46.694.358 1.1a8.7 8.7 0 0 1-2.288 4.04l-.723.724a1.125 1.125 0 0 1-1.298.21l-.153-.076a1.125 1.125 0 0 1-.622-1.006v-1.089c0-.298-.119-.585-.33-.796l-1.347-1.347a1.125 1.125 0 0 1-.21-1.298L9.75 12l-1.64-1.64a6 6 0 0 1-1.676-3.257l-.172-1.03Z" clip-rule="evenodd" />
                        </svg>
                    </slot>
                </PrimaryButton>
                <PrimaryButton :show="showButtonPoint" @click="openModalEliminar(data)" class="mb-2" title="Eliminar refugio" :class-btn="'px-3 py-2 ml-3 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </PrimaryButton>
			</div>
            <AlertSuccess :classMsg="classMsj" :Msg="msg" classIcon="text-green-800">
                <slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                    </svg>
                </slot>
            </AlertSuccess>

			<div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
				<div class="overflow-x-auto w-full">
                    <DataTable id="my-table-id"
                        class="display"
                        :columns="columns"
                        :data="data"
                        :options="options"
                        ref="table"
                        @select="itemSeleccionado"
                        @deselect="itemSeleccionado"
                    >
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
							</tr>
						</thead>
					</DataTable>
				</div>
			</div>
		</div>
        <Modal :show="showModalEliminar" @close="closeModalEliminar">
            <div class="p-6">
                <p>
                    Quiéres eliminar este refugio
                    <span class="text-2x1 font-medium text-gray-900">{{data.refugio}} ? </span>
                </p>

            </div>
            <div class="m-6 flex justify-end">
                <AceptarButton @click="eliminarRefugio" >Si, eliminalo</AceptarButton>
                <SecondaryButton @click="closeModalEliminar" class="ml-4">Cancelar</SecondaryButton>
            </div>
        </Modal>
	</AuthenticatedLayout>
</template>
<style>
@import 'datatables.net-bs5';
@import 'datatables.net-dt';
</style>
