<template>
  <div class="h-full block rounded-lg shadow-xl">
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg" alt=""/>
      <a href="#!">
        <div
            class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
      </a>
    </div>
    <div class="p-6 text-surface h-full">
      <div>
        <h5 class="mb-2 text-xl font-medium leading-tight text-black">{{ title }}</h5>
        <p class="mb-4 text-base text-gray-800 leading-tight">
          {{ content }}
        </p>
        <p class="mb-4 text-base text-gray-800 leading-tight">
          Botão clicado: {{ clickCount }} vezes
        </p>
      </div>
      <div>
        <a href="#!">
          <button
              type="button"
              class="inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
              @click="incrementClickCount"
          >
            Acessar
          </button>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
import {defineProps, ref} from 'vue';

defineProps({
  content: String,
  title: String,
  url: String,
});

const clickCount = ref(0);

function incrementClickCount() {
  clickCount.value += 1;
}
</script>
