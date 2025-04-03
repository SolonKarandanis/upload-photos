<script setup lang="ts">

import Card from "primevue/card";
import Button from 'primevue/button';
import {usePost} from "../composables/usePost.ts";
import {onMounted} from "vue";
import Header from "../components/Header.vue";

const {fetchPosts,iLoading} = usePost();

onMounted(() => {
  fetchPosts();
})
</script>

<template>
  <Header>
    Posts
  </Header>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <Card style="width: 25rem; overflow: hidden">
        <template #header>
          <img alt="user header" src="" />
        </template>
        <template #title>Advanced Card</template>
        <template #subtitle>Card subtitle</template>
        <template #content>
          <p class="m-0">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione quam perferendis esse, cupiditate neque
            quas!
          </p>
        </template>
        <template #footer>
          <div class="flex gap-4 mt-1">
            <Button label="Cancel" severity="secondary" outlined class="w-full" />
            <Button label="Save" class="w-full" />
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>

<style scoped>

</style>