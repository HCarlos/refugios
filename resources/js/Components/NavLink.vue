<template>
  <span v-show="active" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
  <div class="flex">
    <slot name="icon" />
    <Link :href="href"
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-500"
          :title="titulo"
        >
      <span class="ml-4 flex items-center">
        <slot />
        <span class="ml-1">{{captionButton}}</span>
      </span>
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import {Title} from "chart.js";

const props = defineProps(['href', 'active', 'titulo','captionButton']);
</script>
