<template>
    <label class="block text-sm ">
        <span class="text-gray-700 dark:text-gray-400">{{labelText}}</span>
        <!-- focus-within sets the color for the icon when input is focused -->
        <div class="relative text-gray-500 focus-within:text-gray-700 gray:focus-within:text-gray-700 ">
            <select
                class="block w-full pl-10 mt-1 text-sm cols-1 text-dark dark:text-dark-100 gray:border-gray-700 dark:bg-gray-50 focus:border-gray-700 focus:outline-none focus:shadow-outline-gray gray:focus:shadow-outline-gray form-input rounded-md "
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                ref="input"
            >
                <option v-if="isLegend" disabled value="">Selecciona una opción</option>
                <option v-for="option in opciones" :value="option.id" >
                    {{ option.text }}
                </option>
            </select>
            <div class="absolute inset-y-0 flex items-center ml-2 pointer-events-none">
                <slot />
            </div>
        </div>
    </label>
</template>

<script setup>

import { onMounted, ref } from 'vue';

const props = defineProps(['textLabel','opciones','modelValue','isLegend']);
const labelText = props.textLabel == null ? '' : props.textLabel;
// const disabledSelect = props.disabledSelect != null;
const isLegend = props.isLegend != null;

defineEmits(['update:modelValue']);

const input = ref(null);
onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
    if (!isLegend) {
        input.selected = true;
    }
});


</script>
