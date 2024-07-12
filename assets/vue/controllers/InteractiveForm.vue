<template>
  <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
    Texto
  </label>
  <input type="text" v-model="userInput" placeholder="escreva"
         class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
  <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 w-full focus:outline-none focus:shadow-outline"
      type="button" @click="displayMessage">
    Enviar
  </button>
  <div v-if="message" class="w-full p-5 bg-gray-200 border-2 border-gray-300 rounded-md flex justify-center items-center mt-3">
    <p>{{ message }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue';
const props = defineProps({
  initialInput: String
})

const userInput = ref(props.initialInput);
const message = ref("");

const displayMessage = () => {
  message.value = userInput.value;
  userInput.value = '';
}
</script>
