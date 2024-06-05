<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import WarningButton from "@/Components/WarningButton.vue";
import { ref } from "vue"

const props = defineProps({
	Refugios: {type: Object},
    flash: {type: Object}
})
const form = useForm({
    id:'',
    refugio:'',ubicacion:'',ubicacion_google:'',
    enlace:'',telefonos:'',observaciones:'',
    latitud:'',longitud:'',html:'',infraestructura:'',
    activado:'',poligono:'',categoria:'',capacidad:'',
    imagen:'',refugiorutaid:'',
});

const showModalEliminar = ref(false);
const msj = ref( (props.flash.success != null) ? props.flash.success : '');
const classMsj = ref( (props.flash.success != null) ? '' : 'hidden');

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
            ok('Refugio eliminado con exito');
        }
    });
};

const ok = (m) =>{
    closeModalEliminar();
    form.reset();
    msj.value=m;
    classMsj.value = 'block';
    setTimeout(()=>{
       classMsj.value = 'hidden'
        msj.value='';
    },800);
}

var tituloUser = "Refugios";

</script>

<template>
	<Head title="Refugios" />

	<AuthenticatedLayout>
		<template #header>
            {{ tituloUser }}
		</template>

		<div class="p-4 bg-white rounded-lg shadow-xs">
			<div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
				<div class="flex justify-center items-center w-12 bg-blue-500">
					<svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
					</svg>
				</div>

				<div class="px-4 py-2 -mx-3">
					<div class="mx-3">
						<span class="font-semibold text-blue-500">Catálogo</span>
						<p class="text-sm text-gray-600">General {{ msj }}</p>
                        <NavLink :href="route('refugio.create')" >
                            <PrimaryButton>
                                Nuevo
                            </PrimaryButton>
                        </NavLink>
					</div>
				</div>
			</div>

			<div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
				<div class="overflow-x-auto w-full">
					<table class="w-full whitespace-no-wrap">
						<thead>
							<tr class="text-xs font-bold tracking-wide text-left text-blue-500 uppercase bg-gray-300 border-b">
								<th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Refugio</th>
								<th class="px-4 py-3">Ubicación</th>
                                <th class="px-4 py-3">Infraestructra</th>
                                <th class="px-4 py-3">Capacidad</th>
                                <th class="px-4 py-3">Enlace</th>
                                <th class="px-4 py-3">Teléfonos</th>
                                <th class="px-4 py-3">Observaciones</th>
                                <th class="px-4 py-3">Latitud</th>
                                <th class="px-4 py-3">Longitud</th>
                                <th class="px-4 py-3">---</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y">
							<tr v-for="Refugio in Refugios.data" :key="Refugio.id" class="text-gray-700">
								<td class="px-4 py-3 text-xs">
                                    <NavLink :href="route('refugio.edit',Refugio.id)">
                                        <SecondaryButton title="Editar refugio">
                                            {{ Refugio.numero }}
                                        </SecondaryButton>
                                    </NavLink>
                                </td>
								<td class="px-4 py-3 text-xs">
									{{ Refugio.refugio }}
								</td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.ubicacion }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.infraestructura }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.capacidad }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.enlace }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.telefonos }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.observaciones }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.latitud }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Refugio.longitud }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <WarningButton @click="openModalEliminar(Refugio)" title="Eliminar refugio">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </WarningButton>
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
                    <PrimaryButton @click="eliminarRefugio">Yes, eliminalo</PrimaryButton>
                </p>

            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalEliminar">Cancelar</SecondaryButton>
            </div>
        </Modal>
	</AuthenticatedLayout>
</template>
