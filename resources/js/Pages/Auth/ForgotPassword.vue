<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import AceptarButton from '@/Components/AceptarButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
	status: {
		type: String,
	},
});

const form = useForm({
	email: '',
});

const submit = () => {
	form.post(route('password.email'));
};
</script>

<template>
	<GuestLayout>
		<Head title="Forgot Password" />

		<div class="flex flex-col overflow-y-auto md:flex-row">
			<div class="h-32 md:h-auto md:w-1/2">
				<img
					aria-hidden="true"
					class="object-cover w-full h-full"
					src="/images/forgot-password-office.jpeg"
					alt="Office"
				/>
			</div>
			<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
				<div class="w-full">
					<h1 class="mb-4 font-semibold text-gray-700">
                        ¿Olvidó su contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.
					</h1>

					<div v-if="status" class="mb-4 text-sm font-medium text-green-600">
						{{ status }}
					</div>

					<form @submit.prevent="submit">
						<div>
							<InputLabel for="email" value="Cuenta de correo" />
							<TextInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required autofocus autocomplete="username" />
							<InputError class="mt-2" :message="form.errors.email" />
						</div>

						<div class="flex items-center justify-end mt-4">
							<AceptarButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Enlace para restablecer contraseña de correo electrónico
							</AceptarButton>
						</div>
					</form>
				</div>
			</div>
		</div>
	</GuestLayout>
</template>
