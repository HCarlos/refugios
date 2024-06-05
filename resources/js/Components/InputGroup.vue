<template>
    <label class="block text-sm ">
    <span class="text-gray-700 dark:text-gray-400">{{labelText}}</span>
    <!-- focus-within sets the color for the icon when input is focused -->
    <div class="relative text-gray-500 focus-within:text-gray-700 gray:focus-within:text-gray-700 ">
        <input
            class="block w-full pl-10 mt-1 text-sm cols-1 text-dark dark:text-dark-100 gray:border-gray-700 dark:bg-gray-50 focus:border-gray-700 focus:outline-none focus:shadow-outline-gray gray:focus:shadow-outline-gray form-input rounded-md "
            :value="modelValue"
            :type="type"
            :required="required"
            :placeholder="placeholder"
            :accept="accept"
            :disabled=disabledInput
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
        />
        <div class="absolute inset-y-0 flex items-center ml-2 pointer-events-none">
            <slot />
        </div>
    </div>
</label>
    <InputError class="mt-1" :message="errors" />
</template>

<script setup>

import { onMounted, ref } from 'vue';
import InputError from "@/Components/InputError.vue";


const props = defineProps(['textLabel','text','placeholder','accept','required','type','modelValue','errors','disabledInput']);



const labelText = props.textLabel == null ? '' : props.textLabel;
const disabledInput = props.disabledInput != null;


// console.log(props.textLabel);
// console.log(props.placeholder);
// console.log(props.required);
// console.log(props.type);


defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

</script>
