<template>
    <button :type="type" class="rounded-lg border border-transparent bg-yellow-900 px-4 py-2 text-center text-sm font-medium leading-5 text-black transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-yellow-900">
        <slot/>
    </button>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
