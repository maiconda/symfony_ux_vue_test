<script setup>
import {defineProps} from "vue";

const props = defineProps({
  onClick: {
    type: Function,
    required: true,
  }
})
</script>

<template>
  <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 w-full focus:outline-none focus:shadow-outline"
      type="button" @click="props.onClick">
    click
  </button>
</template>
