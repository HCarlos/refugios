<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import AlertSuccess from "@/Components/AlertSuccess.vue";
import {onMounted, ref} from "vue"
import DarkButton from "@/Components/DarkButton.vue";

const props = defineProps({
	Refugios: {type: Object},
    flash: {type: Object}
})

// const columns = [
//     {data: 'id', title: 'ID'},
//     {data: 'numero', title: '#'},
//     {data: 'refugio', title: 'REFUGIO'},
//     {data: 'ubicacion', title: 'UBICACION'},
//     {data: 'infraestructura', title: 'INFRAESTRUCTURA'},
//     {data: 'capacidad', title: 'CAPACIDAD'},
//     {data: 'enlace', title: 'ENLACE'},
//     {data: 'telefonos', title: 'TELEFONOS'}
// ];

// props.Refugios.data.map(function(value, key) {
//     data.value.push(value);
// });



// onMounted(function () {
//     dt = table.value.dt;
// });

const form = useForm({
    id:'',
    refugio:'',ubicacion:'',ubicacion_google:'',
    enlace:'',telefonos:'',observaciones:'',
    latitud:'',longitud:'',html:'',infraestructura:'',
    activado:'',poligono:'',categoria:'',capacidad:'',
    imagen:'',refugiorutaid:'',
});

const showModalEliminar = ref(false);
const msg = ref( (props.flash.success != null) ? props.flash.success : '');
const classMsj = ref( (props.flash.success != null) ? '' : 'hidden');
const table = ref();

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

const editMapPointRefugio = (r) => {
    window.open("/refugios-getPosition.php?id=" + r.id);
};



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

				<div class="px-4 py-2 -mx-3">
					<div class="mx-3">
                        <NavLink :href="route('refugio.create')" :titulo="'Nuevo refugio'" :captionButton="'Nuevo'">
                            <slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                </svg>
                            </slot>
                        </NavLink>
					</div>
				</div>
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
				</div>
				<div
					class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
					<pagination :links="Refugios.links" />
				</div>
			</div>
		</div>
        <Modal :show="showModalEliminar" @close="closeModalEliminar">
            <div class="p-6">
                <p>
                    Quiéres eliminar este refugio
                    <span class="text-2x1 font-medium text-gray-900">{{form.refugio}} ? </span>
                </p>

            </div>
            <div class="m-6 flex justify-end">
                <PrimaryButton @click="eliminarRefugio" class="mr-4">Si, eliminalo</PrimaryButton>
                <SecondaryButton @click="closeModalEliminar">Cancelar</SecondaryButton>
            </div>
        </Modal>
	</AuthenticatedLayout>
</template>
<!--<style>-->
<!--@import 'datatables.net-bs5';-->
<!--@import 'datatables.net-dt';-->
<!--</style>-->
