<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import DarkButton from "@/Components/DarkButton.vue";

const props = defineProps({
    Refugio: {type: Object},
    Rutas: {type: Object},
    Ruta: {type: String}
})

</script>

<template>
	<Head title="Editar" />

	<AuthenticatedLayout>
		<template #header>
            <div class="inline-flex overflow-hidden mb-4 w-full">
    			Editando el Refugio {{ Refugio.id }} => {{ Refugio.refugio }}
                <NavLink :href="route('refugios.index')">
                    <DarkButton title="Listado de Refugios">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                        </svg>
                    </DarkButton>
                </NavLink>
            </div>
		</template>

		<div class="grid gap-6 bg-white mb-8 md:grid-cols-2 border rounded-lg">
			<div class="min-w-0 p-4 rounded-lg shadow-xs">
                <p>Número: <span class="text-gray-900 font-semibold">{{ Refugio.numero }}</span></p>
                <p>Refugio: <span class="text-gray-900 font-semibold">{{ Refugio.refugio }}</span></p>
                <p>Ubicación: <span class="text-gray-900 font-semibold">{{ Refugio.ubicacion }}</span></p>
                <p>Ubicación Google: <span class="text-gray-900 font-semibold">{{ Refugio.ubicacion_google }}</span></p>
                <p>Ruta: <span class="text-gray-900 font-semibold">{{ Refugio.ruta.ruta }}</span></p>
                <p>Infraestructura: <span class="text-gray-900 font-semibold">{{ Refugio.infraestructura }}</span></p>
                <p>Capacitad: <span class="text-gray-900 font-semibold">{{ Refugio.capacidad }}</span></p>
                <p>Enlace: <span class="text-gray-900 font-semibold">{{ Refugio.enlace }}</span></p>
                <p>Teléfonos: <span class="text-gray-900 font-semibold">{{ Refugio.telefonos }}</span></p>
                <p>Categoría: <span class="text-gray-900 font-semibold">{{ Refugio.categoria }}</span></p>
                <p>Habilitado: <span class="text-gray-900 font-semibold">{{ Refugio.activado ? "SI" : "NO" }}</span></p>
                <p>Observaciones: <span class="text-gray-900 font-semibold">{{ Refugio.observaciones }}</span></p>
                <p>Polígono: <span class="text-gray-900 font-semibold">{{ Refugio.poligono }}</span></p>
                <p>Latitud: <span class="text-gray-900 font-semibold">{{ Refugio.latitud }}</span></p>
                <p>Longitud: <span class="text-gray-900 font-semibold">{{ Refugio.longitud }}</span></p>
			</div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <img :src="'../storage/externo/'+ Refugio.imagen " :alt="Refugio.refugio">
            </div>
		</div>

	</AuthenticatedLayout>
</template>
