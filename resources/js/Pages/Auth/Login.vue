<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import AceptarButton from '@/Components/AceptarButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
	username: '',
    password: '',
	remember: false
});

const submit = () => {
	form.post(route('login'), {
		onFinish: () => form.reset('password'),
	});
};
</script>

<template>
	<GuestLayout>
		<Head title="Log in" />

		<div class="flex flex-col overflow-y-auto md:flex-row">
			<div class="h-32 md:h-auto md:w-1/2">
				<img aria-hidden="true" class="object-cover w-full h-full" src="/images/login-office.jpeg" alt="Office" />
			</div>
			<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
				<div class="w-full">
					<h1 class="mb-4 text-xl font-semibold text-gray-700">Ingresar</h1>

					<div v-if="status" class="mb-4 text-sm font-medium text-green-600">
						{{ status }}
					</div>

					<form @submit.prevent="submit">
						<div class="mt-4">
							<InputLabel for="username" value="Nombre de Usuario" />
							<TextInput id="username" type="username" class="block w-full mt-1" v-model="form.username" required autofocus autocomplete="username" />
							<InputError class="mt-2" :message="form.errors.username" />
						</div>

						<div class="mt-4">
							<InputLabel for="password" value="Contraseña" />
							<TextInput id="password" type="password" class="block w-full mt-1" v-model="form.password" required autocomplete="current-password" />
							<InputError class="mt-2" :message="form.errors.password" />
						</div>

						<div class="block mt-4">
							<label class="flex items-center">
								<Checkbox name="remember" v-model:checked="form.remember" />
								<span class="ml-2 text-sm text-gray-600">Recordar</span> </label>
						</div>

						<div class="flex items-center justify-end mt-4">
							<Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-gray-600 underline  hover:text-gray-900">
								Olvidó su Contraseña?
							</Link>

							<AceptarButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
								Ingresar
							</AceptarButton>
						</div>
					</form>
				</div>
			</div>
		</div>
	</GuestLayout>
</template>
