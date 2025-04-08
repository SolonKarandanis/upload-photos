<script setup lang="ts">

import Card from "primevue/card";
import Button from 'primevue/button';
import Chip from 'primevue/chip';
import Skeleton from 'primevue/skeleton';
import {usePost} from "../composables/usePost.ts";
import {onMounted} from "vue";
import Header from "../components/Header.vue";

const {fetchPosts,posts,iLoading} = usePost();

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
      <Card v-for="post in posts"
            :key="post.id"
            style="width: 25rem; overflow: hidden">
        <template #header>
          <img :src="post.image" alt="Image" />
        </template>
        <template #title>{{post.title}}}</template>
        <template #subtitle>
          <Chip  v-for="category in post.categories"
                 :key="category.id"
                 :label="category.name" />
        </template>
        <template #content>
          <p class="m-0">
            {{post.postContent}}
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