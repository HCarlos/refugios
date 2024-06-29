<template>
    <div>
          <button
              :type="type"
              :class="classBtn"
              v-show="show"
          >
            <slot/>
          </button>
    </div>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    classBtn: {
        type: String,
        default: '',
    },
    show: {
        type: Boolean,
        default: false,
    },

});
</script>
