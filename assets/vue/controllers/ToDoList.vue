<template>
  <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
    Tarefa
  </label>
  <input type="text" v-model="taskInput" placeholder="escreva"
         class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
  <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 w-full focus:outline-none focus:shadow-outline"
      type="button" @click="addTask">
    Enviar
  </button>
  <ul>
    <li class="flex p-2 mt-2 ps-4 rounded justify-between items-center bg-blue-200" v-for="(item, index) in tasks" :key="index">
      <p>{{ item }}</p>
      <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="button" @click="removeTask(index)">
        Remover
      </button>
    </li>
  </ul>
</template>

<script setup>
import { ref } from 'vue';

const taskInput = ref('');
const tasks = ref([]);

const addTask = () => {
  if (taskInput.value !== '') {
    tasks.value.push(taskInput.value);
    taskInput.value = '';
  }
}
const removeTask = (index) => {
  tasks.value.splice(index, 1);
}

</script>