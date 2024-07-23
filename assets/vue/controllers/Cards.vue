<template>
  <div class="mt-7 grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
    <Card
        v-for="(item, index) in items"
        :key="index"
        :title="item.title"
    />
  </div>
</template>

<script>
import axios from "axios";
import Card from "./Card.vue";

export default {
  components: { Card },
  data() {
    return {
      items: []
    };
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('/api/books');
        this.items = response.data.data;
        console.log(this.items.length);
      } catch (error) {
        console.error('Erro ao buscar dados:', error);
      }
    },
  },
  mounted() {
    this.fetchData();
  }
};
</script>

<style scoped>
</style>
